<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Event;
use App\Models\Servicio;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dashboard.store')->only('store');
        $this->middleware('can:dashboard.update')->only('update');
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

        $citasss = Event::all()->count();
        
        $fechaa = Carbon::parse(now());
        $citasssp = Event::all()->where('start_date', '>',  $fechaa)->count();

        $fechad = Carbon::parse(now());
        $citasssd = Event::all()->where('start_date', '<',  $fechad)->count();


        $citas = Event::query()
        ->with(['cliente', 'operario'])->where('user_id', '=', auth()->user()->id)->get();

       // return redirect()->route('cita.store',  compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd'))->with('success', 'Cita Agendada con Exito');

       return view('dashboard', compact('users', 'events', 'citas', 'citasss', 'citasssp', 'citasssd', 'services')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

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
           // return redirect()->route('dashboard');
        }catch (\Exception $e){
            Alert::error('¡Error!', 'Parece que alguno de los datos introducidos no es valido o se encuentran ocupados')->autoClose(5000); 
            return back();
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
