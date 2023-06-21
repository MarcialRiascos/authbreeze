<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');

        $rules = [
            'file' => 'required|mimes:jpeg,png',
        ];
  
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
                $name = auth()->user()->file;

                try{
                    DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->update([
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'sex' => $request->sex,
                        'dni' => $request->dni,
                        'nacimiento' => $request->nacimiento, 
                        'description' => $request->description,
                        'facebook' => $request->facebook,
                        'instagram' => $request->instagram, 
                        'youtube' => $request->youtube,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'file' => $name,
                   ]);

                   Alert::success('¡Éxito!', 'Perfil modificado')->autoClose(5000); 
                   return back();
                   // redirect()->route('profile.edit')->with('success', 'Perfil modificado exitosamente');
                }catch(\Exception $e){
                    Alert::error('¡Error!', 'Perfil no modificado')->autoClose(5000); 
                    return back();
                    //return redirect()->route('profile.edit')->with('danger', 'Perfil no modificado');
                }
  
             
        }else{
             
   try {

    $path = 'photos';
          // $original_name = $request->file('file')->getClientOriginalName();
           $final_name = Str::slug($request->file('file')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file')->getClientOriginalExtension());
  
         
           $request->file->storeAs($path, $final_name, 'photos');
           $name = 'assets/assets/photos/'.$final_name;
    
               DB::table('users')
               ->where('id', auth()->user()->id)
               ->update([
                   'name' => $request->name,
                   'lastname' => $request->lastname,
                   'sex' => $request->sex,
                   'dni' => $request->dni,
                   'nacimiento' => $request->nacimiento, 
                   'description' => $request->description,
                   'facebook' => $request->facebook,
                   'instagram' => $request->instagram, 
                   'youtube' => $request->youtube,
                   'phone' => $request->phone,
                   'email' => $request->email,
                   'file' => $name,
              ]);

              Alert::success('¡Éxito!', 'Perfil modificado')->autoClose(5000); 
              return back();
           // return redirect()->route('profile.edit')->with('success', 'Perfil modificado exitosamente');
          // return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            Alert::error('¡Error!', 'Perfil no modificado')->autoClose(5000); 
            return back();
           // return redirect()->route('profile.edit')->with('danger', 'Perfil no modificado');
        }
    }

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
