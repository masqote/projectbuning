<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $email = session()->get('email'); // mengambil session email
        $profile = DB::table('users')->where('email', $email)->first(); // melakukan check ke database dimana email = $email (session)
        return view('layouts.template', compact('profile'));
    }
    //menampilkan template dashboard
    public function dashboard()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('dashboard');
        }
    }

    public function project()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('project');
        }
    }

    //Menampilkan template profile
    public function profile()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }else{
            $email = session()->get('email'); // mengambil session email
            $profile = DB::table('users')->where('email', $email)->first(); // melakukan check ke database dimana email = $email (session)
            return view('profile', compact('profile'));
        }
    }

    //Update data untuk Edit Profile
    public function profileUpdate(Request $request)
    {
        $email = session()->get('email'); // mengambil session email
        // $checkFoto = User::where('email',$email)->first();
        $file = $request->file('file');
        if ($file != null) { // untuk mengecek apakah ada file atau tidak, jika ada file maka melakukan proses dibawah
            $this->validate($request, [
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload,$nama_file);

            $data = User::where('email',$email)->first(); // Melakukan check pada table USER where email = $email
            $data->name = $request->name; // mengambil value dari form name pada blade template
            $data->email = $request->email;
            $data->file = $nama_file;
            if ($request->name && $request->email != null) { // melakukan check pada form, jika nama dan email menjadi kosong, maka dia akan gagal, dan jika tidak kosong maka berhasil
                $data->save();
                return redirect('/profile')->with('alert-success','Data berhasil diubah!'); // jika berhasil mengembalikan kedalam halaman profile dan membawa session alert-success
            }else{
                return redirect('/profile')->with('gagal','Data tidak dapat diubah!'); // jika berhasil mengembalikan kedalam halaman profile dan membawa session gagal
            }
        }
           // Jika tidak ada file maka melanjutkan proses ini
        $data = User::where('email',$email)->first(); // Melakukan check pada table USER where email = $email
        $data->name = $request->name; // mengambil value dari form name pada blade template
        $data->email = $request->email;
        if ($request->name && $request->email != null) { // melakukan check pada form, jika nama dan email menjadi kosong, maka dia akan gagal, dan jika tidak kosong maka berhasil
            $data->save();
            return redirect('/profile')->with('alert-success','Data berhasil diubah!'); // jika berhasil mengembalikan kedalam halaman profile dan membawa session alert-success
        }else{
            return redirect('/profile')->with('gagal','Data tidak dapat diubah!'); // jika berhasil mengembalikan kedalam halaman profile dan membawa session gagal
        }
        
       
    }

    public function resetPassword(Request $request)
    {
        $email = session()->get('email'); // mengambil session email
        $data = User::where('email',$email)->first();
        $validatedData = $request->validate([
            'current_password' => 'required|min:4',
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
        $check = Hash::check($request->current_password, $data->password);
        
        if ($check == true) {
            $data->password = bcrypt($request->new_password);
            $data->save();
            Session::flush();
            return redirect('/login')->with('alert-success','Password berhasil diubah!');
        }else{
            return redirect('/profile')->with('gagal','Password tidak berhasil diubah!');
        }
        
    }
}
