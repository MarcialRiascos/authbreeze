<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role as ModelsRole;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:servicio.index')->only('index');
        $this->middleware('can:servicio.destroy')->only('destroy');
        $this->middleware('can:servicio.store')->only('store');
        $this->middleware('can:servicio.update')->only('update');
    }

    public function index()
    {
             // $users = User::all();
             $usersi = ModelsRole::where('name', 'empleado')->first()->id;
             $users = User::role($usersi)->get();

             $services = Servicio::all();
     
     
             // $roleId = ModelsRole::where('name', 'empleado')->first()->id;
             // $roles = User::role($roleId)->get();
     
             $all_events = Event::all();
             $events = [];
             foreach($all_events as $event){
                 $events[] = [
                     'title' => $event->event,
                     'start' => $event->start_date,
                 ];
             }
     
             $citasss = Servicio::all()->count();
             
     
     
             $citas = Event::query()
             ->with(['cliente', 'operario'])->where('user_id', '=', auth()->user()->id)->get();
     
            // return redirect()->route('cita.store',  compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd'))->with('success', 'Cita Agendada con Exito');
     
            return view('servicios', compact('users', 'events', 'citas', 'citasss', 'services')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // $users = User::all();
         $usersi = ModelsRole::where('name', 'empleado')->first()->id;
         $users = User::role($usersi)->get();
 
 
         // $roleId = ModelsRole::where('name', 'empleado')->first()->id;
         // $roles = User::role($roleId)->get();
 
         $all_events = Event::all();
         $events = [];
         foreach($all_events as $event){
             $events[] = [
                 'title' => $event->event,
                 'start' => $event->start_date,
             ];
         }
 
         $citasss = Servicio::all()->count();
         
 
         $citas = Event::query()
         ->with(['cliente', 'operario'])->where('user_id', '=', auth()->user()->id)->get();

        
         $services = Servicio::all();

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:jpeg,png',
            'file2' => 'required|mimes:jpeg,png',
            'file3' => 'required|mimes:jpeg,png',
            'file4' => 'required|mimes:jpeg,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            Alert::error('¡Error!', 'Las imagenes no se han cargado correctamente, debe cargarlas todas')->autoClose(5000); 
            return back();
           // return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Error, las imagenes no se han cargado correctamente, debe cargarlas todas');
        }else{
           $path = 'uploads';
          // $original_name = $request->file('file')->getClientOriginalName();
           $final_name = Str::slug($request->file('file')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file')->getClientOriginalExtension());

         //  $original_name2 = $request->file('file2')->getClientOriginalName();
           $final_name2 = Str::slug($request->file('file2')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file2')->getClientOriginalExtension());

         //  $original_name3 = $request->file('file3')->getClientOriginalName();
           $final_name3 = Str::slug($request->file('file3')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file3')->getClientOriginalExtension());
           
         //  $original_name4 = $request->file('file4')->getClientOriginalName();
           $final_name4 = Str::slug($request->file('file4')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file4')->getClientOriginalExtension());

           $request->file->storeAs($path, $final_name, 'uploads');
           $name = 'assets/assets/uploads/'.$final_name;
           $request->file2->storeAs($path, $final_name2, 'uploads');
           $name2 = 'assets/assets/uploads/'.$final_name2;
           $request->file3->storeAs($path, $final_name3, 'uploads');
           $name3 = 'assets/assets/uploads/'.$final_name3;
           $request->file4->storeAs($path, $final_name4, 'uploads');
           $name4 = 'assets/assets/uploads/'.$final_name4;

           

           

        try {
            Servicio::create([
                'name' => $request->name,
                'description' => $request->description,
                'precio' =>  $request->precio, 
                'tiempo' => $request->tiempo,
                'file' => $name,
                'file2' => $name2,
                'file3' => $name3,
                'file4' => $name4,
            ]);
        
            Alert::success('¡Éxito!', 'Servicio creado')->autoClose(5000); 
            return back();
            //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('success', 'Servicio creado exitosamente');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'El servicio no ha sido creado, intente nuevamente')->autoClose(5000); 
            return back();
            //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Error, el servicio no ha sido creado, intente nuevamente');
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
       
      $rules = [
          'name' => 'required',
          'description' => 'required',
          'file' => 'required|mimes:jpeg,png',
          'file2' => 'required|mimes:jpeg,png',
          'file3' => 'required|mimes:jpeg,png',
          'file4' => 'required|mimes:jpeg,png',
      ];

      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        try {
            DB::table('servicios')
            ->where('id', $request->id)
            ->update([
               'name' =>  $request->name, 
               'description' => $request->description,
               'precio' =>  $request->precio, 
               'tiempo' => $request->tiempo,
           ]);

           Alert::Warning('Advertencia', 'Servicio modificado pero las imagenes no se han cargado, debe cargarlas todas')->autoClose(5000); 
           return back();
          // return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('success', 'Servicio modificado pero las imagenes no se han cargado, debe cargarlas todas');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Servicio no modificado')->autoClose(5000); 
            return back();
            //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Servicio no modificado');
        }

        Alert::error('¡Error!', 'Las imagenes no se han cargado, debe cargarlas todas')->autoClose(5000); 
        return back();
         // return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Error, las imagenes no se han cargado correctamente');
      }else{
        $path = 'uploads';
        // $original_name = $request->file('file')->getClientOriginalName();
         $final_name = Str::slug($request->file('file')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file')->getClientOriginalExtension());

       //  $original_name2 = $request->file('file2')->getClientOriginalName();
         $final_name2 = Str::slug($request->file('file2')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file2')->getClientOriginalExtension());

       //  $original_name3 = $request->file('file3')->getClientOriginalName();
         $final_name3 = Str::slug($request->file('file3')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file3')->getClientOriginalExtension());
         
       //  $original_name4 = $request->file('file4')->getClientOriginalName();
         $final_name4 = Str::slug($request->file('file4')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file4')->getClientOriginalExtension());

         $request->file->storeAs($path, $final_name, 'uploads');
         $name = 'assets/assets/uploads/'.$final_name;
         $request->file2->storeAs($path, $final_name2, 'uploads');
         $name2 = 'assets/assets/uploads/'.$final_name2;
         $request->file3->storeAs($path, $final_name3, 'uploads');
         $name3 = 'assets/assets/uploads/'.$final_name3;
         $request->file4->storeAs($path, $final_name4, 'uploads');
         $name4 = 'assets/assets/uploads/'.$final_name4;

         try {
            DB::table('servicios')
            ->where('id', $request->id)
            ->update([
               'name' =>  $request->name, 
               'description' => $request->description,
               'precio' =>  $request->precio, 
               'tiempo' => $request->tiempo,
               'file' => $name,
               'file2' => $name2,
               'file3' => $name3,
               'file4' => $name4,
           ]);
           Alert::success('¡Éxito!', 'Servicio modificado')->autoClose(5000); 
           return back();
           //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('success', 'Servicio modificado exitosamente');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Servicio no modificado')->autoClose(5000); 
            return back();
           // return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Servicio no modificado');
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $delete = $request->id;
            $dato = Servicio::find($delete);
            $dato->delete();

            Alert::success('¡Éxito!', 'Servicio eliminado')->autoClose(5000); 
            return back();
            //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('success', 'Servicio eliminado exitosamente');

        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Servicio no eliminado')->autoClose(5000); 
            return back();
            //return redirect()->route('servicio.store',  compact('users', 'events', 'citas', 'citasss', 'services'))->with('danger', 'Servicio no eliminado');
        }
        
    }   
}
