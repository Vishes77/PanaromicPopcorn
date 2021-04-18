<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session as FacadesSession;

class Users extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|string|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'email' => 'required|email|max:199|exists:mysql.users,email'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $table = DB::table('users')->select()->where('email', $email)->get();
        // select * users where 
        $arr = json_decode(json_encode($table), true);
        $pass = $arr[0]['password'];
        $uid = $arr[0]['username'];
        if (Hash::check($password, $pass)) {
            session(['uid' => $uid]);
            redirect()->to('../')->send();
        }
        return redirect()->back()->withInput($request->only('password'))->withErrors([
            'password' => 'The password entered is wrong',
        ]);
    }

    public function signup(Request $request)
    {

        $request->validate([
            'password' => 'required|min:8|string|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'cpassword' => 'required|same:password',
            'username' => 'required|alpha_num|max:199|unique:users,username',
            'email' => 'required|email|max:199|unique:users,email'
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $hash = Hash::make($password);
        $table = DB::table('users')->insert(['username' => $username, 'email' => $email, 'password' => $hash]);
        if ($table) {
            session(['uid' => $username]);
            return redirect()->to('../')->send();
        }
    }

    public function logout()
    {
        session(['uid' => ""]);
        // print_r(Route::getCurrentRoute());
        return redirect()->to('')->send();
    }
}
