<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(){
        return view('web.login');
    }

    public function postlogin(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $request->session()->regenerate();

            Alert::success('Selamat Datang Kembali ' . auth()->user()->name);
            return redirect()->intended('admin/dashboard');

        }
        Alert::error('Error Login','ID atau Password salah');
        return redirect()->to('/login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
