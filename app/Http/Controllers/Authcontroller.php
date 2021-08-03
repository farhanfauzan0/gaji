<?php

namespace App\Http\Controllers;

use App\Models\Userclient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function index_login_admin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('index');
        } else {

            return view('login.login');
        }
    }

    function login_web_post(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'mssg' => 'Masukan data dengan benar']);
        }

        $data = [
            'username'     => $request->username,
            'password'  => $request->password,
        ];

        Auth::guard('web')->attempt($data);

        // dd($a);

        if (Auth::guard('web')->check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('index');
        } else { // false
            return redirect()->route('login.admin.index')->with('error', true);
        }
    }
}
