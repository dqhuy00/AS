<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $user = DB::table('accounts')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            Session::put('user', $user);
            return redirect()->route('page.home');
        }

        return 'err';

    }

    public function dangky(Request $request)
    {
        $data = [
            'fullname' => $request['fullname'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // dd($data);
        // dd($request->all());
        DB::table('accounts')->insert($data);
        return redirect()->route('page.home');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('page.home');
    }
}
