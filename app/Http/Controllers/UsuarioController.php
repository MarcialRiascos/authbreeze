<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:usuario.index')->only('index');
        $this->middleware('can:usuario.create')->only('create');
        $this->middleware('can:usuario.store')->only('store');
        $this->middleware('can:usuario.update')->only('update');
    }


    public function index()
    {
        $users = User::all();

        $all_events = Event::all();
        $events = [];
        foreach($all_events as $event){
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
            ];
        }

        $citasss = Event::all()->count();
        
        $fechaa = Carbon::parse(now());
        $citasssp = Event::all()->where('start_date', '>',  $fechaa)->count();

        $fechad = Carbon::parse(now());
        $citasssd = Event::all()->where('start_date', '<',  $fechad)->count();


        $citas = Event::query()
        ->with(['cliente', 'operario'])->where('user_id', '=', auth()->user()->id)->get();

        $results = DB::select('SELECT * FROM model_has_roles');

        $admind = DB::select('SELECT COUNT(*) as total FROM model_has_roles WHERE role_id = 1');
        $empleado = DB::select('SELECT COUNT(*) as total FROM model_has_roles WHERE role_id = 3');
        $usuar = DB::select('SELECT COUNT(*) as total FROM model_has_roles WHERE role_id = 2');
        $totis = DB::select('SELECT COUNT(*) as total FROM model_has_roles');
      
        
        
       return view('usuarios', compact('users', 'events', 'citas', 'results', 'admind', 'empleado', 'usuar', 'totis')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            DB::table('model_has_roles')
            ->where('model_id', $request->model_id)
            ->update(['role_id' =>  $request->role_id]);
         //   DB::update('update model_has_roles set role_id ='.$request->role_id.'where model_id = '.$request->model_id.'');
         Alert::success('¡Éxito!', 'El rol del usuario ha sido modificado')->autoClose(5000); 
         return back();
           // return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'results', 'admind', 'empleado', 'usuar', 'totis'))->with('success', 'Rol modificado con exito');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'El rol del usuario no ha sido modificado')->autoClose(5000); 
            return back();
            //return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'results', 'admind', 'empleado', 'usuar', 'totis'))->with('danger', 'Rol no modificado con exito');
        }
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $rol =  $request->rol;
      if($rol == 1){

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'lastname' => ['required', 'string', 'max:200'],
                'sex' => ['required', 'string', 'max:200'],
                'email' => ['required', 'string', 'email', 'max:200', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'sex' => $request->sex,
                'dni' => $request->dni,
                'phone' => $request->phone,
                'email' => $request->email,
                'file' => 'assets/assets/img/avatar/avatar-1.png',
                'password' => Hash::make($request->password),
            ])->assignRole('user');

            Alert::success('¡Éxito!', 'Usuario registrado')->autoClose(5000); 
            return back();
          //  return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd'))->with('success', 'Usuario agregado con exito');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Parece que el email o la identificacion introducidos se encuentran ocupados ')->autoClose(5000); 
            return back();
           // return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd'))->with('danger', 'Usuario no agregado, ya existe alguien resgistrado con el mismo email, telefono, o identificacion, verifique los datos.');
        }

      
      }else if($rol == 2){

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'lastname' => ['required', 'string', 'max:200'],
                'sex' => ['required', 'string', 'max:200'],
                'email' => ['required', 'string', 'email', 'max:200', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'sex' => $request->sex,
                'dni' => $request->dni,
                'phone' => $request->phone,
                'email' => $request->email,
                'file' => 'assets/assets/img/avatar/avatar-1.png',
                'password' => Hash::make($request->password),
            ])->assignRole('empleado');

            Alert::success('¡Éxito!', 'Empleado registrado')->autoClose(5000); 
            return back();
           // return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('success', 'Usuario agregado con exito');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Parece que el email o la identificacion introducidos se encuentran ocupados')->autoClose(5000); 
            return back();
            //return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('danger', 'Usuario no agregado, ya existe alguien resgistrado con el mismo email, telefono, o identificacion, verifique los datos.');
        }
       
      }else{

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'lastname' => ['required', 'string', 'max:200'],
                'sex' => ['required', 'string', 'max:200'],
                'email' => ['required', 'string', 'email', 'max:200', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'sex' => $request->sex,
                'dni' => $request->dni,
                'phone' => $request->phone,
                'email' => $request->email,
                'file' => 'assets/assets/img/avatar/avatar-1.png',
                'password' => Hash::make($request->password),
            ])->assignRole('admin');

            Alert::success('¡Éxito!', 'Administrador registrado')->autoClose(5000); 
            return back();
            //return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('success', 'Usuario agregado con exito');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Parece que el email o la identificacion introducidos se encuentran ocupados')->autoClose(5000); 
            return back();
            //return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('danger', 'Usuario no agregado, ya existe alguien resgistrado con el mismo email, telefono, o identificacion, verifique los datos.');
        }

      }
       

      //  return view('usuarios', compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd')); 
       

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
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all());
            Alert::success('¡Éxito!', 'Usuario actualizado')->autoClose(5000); 
            return back();
           // return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('success', 'Usuario actualizado con exito');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Parece que alguno de los datos introducidos no es valido o se encuentran ocupados')->autoClose(5000); 
            return back();
            //return redirect()->route('usuario.store',  compact('users', 'events', 'citas', 'admind', 'empleado', 'usuar', 'totis'))->with('danger', 'Usuario no actualizado, ya existe alguien resgistrado con el mismo email, telefono, o identificacion, verifique los datos.');
        }
    
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
