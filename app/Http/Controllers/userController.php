<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    function newuser(Request $request)
    {
        $data = [
            'name' => $request->userName,
            'phone' => $request->phoneNumber,
            'address' => $request->address,
            'password' => $request->password,
        ];

        return view('showData', $data);
    }
}
