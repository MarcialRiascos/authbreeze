<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CitaeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:citae.index')->only('index');
        $this->middleware('can:citae.create')->only('create');
        $this->middleware('can:citae.store')->only('store');
        $this->middleware('can:citae.destroy')->only('destroy');
    }

    public function index()
    {


        //ME TRAE LOS USUARIOS QUE TIENEN COMO ROL EMPLEADO
        $usersi = ModelsRole::where('name', 'empleado')->first()->id;
        $users = User::role($usersi)->get();

        $usuarios = User::all();

        

        //ME TRAE EL NUMERO DE CITAS QUE ESTAN PENDIENTES LIGADOS A UN USUARIO EN ESPECIFICO
        $fechaa = Carbon::parse(now());
      

        //ME TRAE LAS CITAS QUE ESTAN PENDIENTES LIGADOS A UN USUARIO EN ESPECIFICO
       $citassspe = Event::all()->where('start_date', '>',  $fechaa)->where('useri_id', '=', auth()->user()->id);
 

        //ME TRAE EL NUMERO DE CITAS QUE ESTAN CUMPLIDAS LIGADOS A UN USUARIO EN ESPECIFICO

        $services = Servicio::all();

        //ME TRAE TODOS LOS EVENTOS
        $all_events = Event::all();
        $events = [];
        foreach ($all_events as $event) {
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
            ];
        }

        //ME TRAE LAS CITAS CON NOMBRE DE CLIENTE Y DE OPERARIO
        $citas = Event::query()->where('useri_id', '=', auth()->user()->id)
            ->with(['cliente', 'operario'])->get();

        $services = Servicio::all();

        return view('citae', compact('users', 'events', 'citassspe', 'citas', 'usuarios', 'services'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $start_date = $request->dia . " " . $request->hora;
        $fecha1 = Carbon::parse($start_date);
        $fecha2 = Carbon::parse(now());

        //ME TRAE TODAS LAS CITAS QUE SON A UNA HORA DETERMINADA Y ESTAN ASOCIADAS A UN EMPLEADO EN PARTICULAR
        $citass = Event::all()->where('start_date', '=', $start_date)->where('useri_id', '=', $request->useri_id);

        if ($fecha1->lt($fecha2)) {
            Alert::error('¡Error!', 'La fecha establecida es inferior a la actual')->autoClose(5000); 
            return back();
           // return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'La fecha y hora que esta introduciendo es anterior a la actulidad, por favor ingrese una fecha valida');
        } else {
            if (!$citass->isEmpty()) {

                foreach ($citass as $cita) {
                    //ME TRAE EL EMPLEADO QUE ESTA LIGADO A LA CITA
                    $epls = User::all()->where('id', '=', $cita->useri_id);
                    // return view('cita', compact('users', 'events', 'epls', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                    Alert::error('¡Error!', 'No hay agenda para los parámetros establecidos')->autoClose(5000); 
                    return back();
                    //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'No hay agenda para la fecha, hora y empleado solicitado, intente consultar con otro empleado para agendar su cita');
                }
            } else {

                // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                //return redirect('/citas')->with('users', 'events');
                Alert::success('¡Éxito!', 'Si hay agenda para los parámetros establecidos')->autoClose(5000); 
                return back();
                //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('success', 'Si hay agenda para la fecha, hora y empleado solicitado, puede agendar su cita');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $start_date = $request->dia . " " . $request->hora;

        $fecha1 = Carbon::parse($start_date);
        $fecha2 = Carbon::parse(now());

        //ME TRAE EL NUMERO DE CITAS QUE ESTAN PENDIENTES LIGADOS A UN USUARIO EN ESPECIFICO
        $fechaa = Carbon::parse(now());



        $citasi = Event::all()->where('start_date', '>=', $fecha2)->where('user_id', '=', $request->user_id)->count();
        //ME TRAE EL NUMERO DE CITAS PENDIENTES QUE TIENE USUARIO
        if ($citasi >= 2) {

           // return view('cita', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
           Alert::error('¡Error!', 'Ya tiene 2 citas pendiente')->autoClose(5000); 
           return back();
           //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'Cita no agedada, puede que ya tenga 2 citas pendientes, el empleado solicitado se encuentra ocupado para la fecha y hora solicitada, o la fecha indroducida no es valida');
        } else {
            if ($fecha1->gt($fecha2)) {

                //ME TRAE LOS EMPLEADOS QUE ESTAN OCUPADOS
                $cita = Event::all()->where('start_date', '=', $start_date)->where('useri_id', '=', $request->useri_id)->count();
                if ($cita == 0) {

                    $cital = Event::all()->where('start_date', '=', $start_date)->where('user_id', '=', $request->user_id)->count();
                    if ($cital == 0) {
                        Event::create([
                            'event' => $request->event,
                            'start_date' => $start_date,
                            'user_id' => $request->user_id,
                            'useri_id' => $request->useri_id,
                        ]);

                        $total = Event::all()->where('useri_id', '=', $request->useri_id)->count();
                        
                        
                        $pendiente = Event::all()->where('useri_id', '=', $request->useri_id)->where('start_date', '>',  $fechaa)->count();

                        $realizado = Event::all()->where('useri_id', '=', $request->useri_id)->where('start_date', '<',  $fechaa)->count();

                        DB::table('users')
                        ->where('id', $request->useri_id)
                        ->update([
                           'total' =>   $total, 
                           'pendiente' =>  $pendiente,
                           'realizado' => $realizado,
                       ]);

                        // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                        Alert::success('¡Éxito!', 'Su cita fue agendada')->autoClose(5000); 
                        return back();
                       // return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('success', 'Cita Agendada con Exito');
                    } else {
                        // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                        Alert::error('¡Error!', 'El empleado no tiene agenda para la fecha y hora establecida')->autoClose(5000); 
                        return back();
                        //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'Cita no agedada, puede que ya tenga 2 citas pendientes, el empleado solicitado se encuentra ocupado para la fecha y hora solicitada, o la fecha indroducida no es valida');
                    }
                } else {
                    // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                    Alert::error('¡Error!', 'El empleado no tiene agenda para la fecha y hora establecida')->autoClose(5000); 
                    return back();
                    //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'Cita no agedada, puede que ya tenga 2 citas pendientes, el empleado solicitado se encuentra ocupado para la fecha y hora solicitada, o la fecha indroducida no es valida');
                }
            } else {
                // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                Alert::error('¡Error!', 'La fecha y hora establecida no son validas')->autoClose(5000); 
                return back();
                //return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'Cita no agedada, puede que ya tenga 2 citas pendientes, el empleado solicitado se encuentra ocupado para la fecha y hora solicitada, o la fecha indroducida no es valida');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete = $request->id;
        $datos = User::find($request->useri_id);
        $fechaa = Carbon::parse(now());
        $services = Servicio::all();
        $dato = Event::find($delete);
    
        if ($dato) {

            $total = Event::all()->where('useri_id', '=',  $request->useri_id)->count(); 
            $pendiente = Event::all()->where('useri_id', '=', $request->useri_id)->where('start_date', '>',  $fechaa)->count();
            $realizado = Event::all()->where('useri_id', '=',  $request->useri_id)->where('start_date', '<',  $fechaa)->count();

            $datos->total =  $total-1;
            $datos->pendiente = $pendiente-1;
            $datos->realizado = $realizado;
            $datos->save();

            $dato->delete();

                // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                Alert::success('¡Éxito!', 'Su cita fue cancelada')->autoClose(5000); 
                return back();
               // return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('success', 'Cita cancelada con exito');
            
        } else {
                   // return view('citas', compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas'));
                   Alert::error('¡Error!', 'Su cita no fue cancelada')->autoClose(5000); 
                   return back();
                  // return redirect()->route('citae.store',  compact('users', 'events', 'citasss', 'citasssp', 'citasssd', 'citassspe', 'citas', 'usuarios', 'services'))->with('danger', 'Error al cancelar su cita');
        }
      
    }
}
