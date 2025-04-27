<?php

namespace App\Http\Controllers\Autor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    //
    public function index(){

        return view('autor.configuracion');

    }

    public function updateProfile(Request $request){

        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|mimes:jpeg,png,jpg', // mejor que no sea requerido en update
            'about' => 'required'
        ]);


        $user = User::findOrFail(Auth::id());
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->about = $validated['about'];

        if ($request->hasFile('image')) {
            // eliminar imagen anterior si existe
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
        
            $rutaNueva = $request->file('image')->store('perfil', 'public');
            $user->image = $rutaNueva; // AQUÍ asignas la nueva ruta a la columna `image`
        }
        
        $user->save();

        Toastr::success('Perfil actualizado correctamente', 'Success');
        return redirect()->back();

    }

    public function updatePassword(Request $request){

        // dd($request->all());

        $this->validate($request, [

            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashpassword = Auth::user()->password;

        if(Hash::check($request->old_password, $hashpassword)){

            if(!Hash::check($request->password, $hashpassword)){

                $user = User::findOrfail(Auth::id());
                $user->password = Hash::make($request->get('password'));
                $user->save();
                Toastr::success('Password Successfully Changed', 'Success');
                Auth::logout();
            }else{

                Toastr::error('New password cannot be the same as old password.', 'Error');
                return redirect()->back();
            }
        }else{
            Toastr::error('Current password not match.','Error');
            return redirect()->back();
        }


    }


}
