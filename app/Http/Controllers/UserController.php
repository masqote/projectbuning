<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('dashboard');
        }
    }

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = User::where('email',$email)->first();
        if($data != null){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('role',$data->role);
                Session::put('file',$data->file);
                Session::put('login',TRUE);
                return redirect('/');
            }
            else{
                return redirect('login')->with('alert','Password Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Email tidak terdaftar');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        $role = session()->get('role');
        if ($role == 1) {
            return view('register');
        }else{
            return redirect('login')->with('alert','You should login first');
        }
       
    }

    public function registerPost(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'email' => 'email|unique:users',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;
        $data->save();
        return redirect('login')->with('alert-success','Registration Successful');
    }
}