<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $student = Student::where('id', $user->id)->first();
       
        



        return view('dashboard', ['student' => $student]);
    }
// return view('pointakses.owner.homeowner', ['totalPelanggan' => $totalPelanggan, 'totalPegawai' => $totalPegawai, 'totalMobil' => $totalMobil, 'totalTransaksi' => $totalTransaksi]);




    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // dd($data);
        

        if (Auth::attempt($data)) {
           

            return redirect()->route('user.dashboard');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors('Email atau password salah');
        }
          

    }



    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
