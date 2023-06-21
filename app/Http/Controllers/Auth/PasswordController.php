<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        try{
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
    
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
    
            Alert::success('¡Éxito!', 'Contraseña actualizada')->autoClose(5000); 
            return back();
            //return back()->with('success', 'Password Actualizada');
        }catch (\Exception $e){
            Alert::error('¡Error!', 'Contraseña no actualizada')->autoClose(5000); 
            return back();
            //return back()->with('danger', 'Password no  Actualizada');
        }
       
    }
}
