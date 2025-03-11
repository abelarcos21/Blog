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

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
            'about' => 'required'

        ]);

        $user = User::findOrfail(Auth::id());
        $user->name = $request->get('name');

        if($request->hasFile('image')){

            if(!Storage::disk('public')->exists('perfil')){
                Storage::disk('public')->makeDirectory('perfil');
            }

            if(Storage::disk('public')->exists('perfil/' . $user->image)){

                Storage::disk('public')->delete('perfil/' . $user->image);
            }

            $perfil = Storage::disk('public')
                ->putFileAs('perfil', $request->image, uniqid().str_replace(' ', '-', $request->image->getClientOriginalName()));
            $user->image = 'storage/' . $perfil;

        }

        $user->email = $request->get('email');
        $user->about = $request->get('about');
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
