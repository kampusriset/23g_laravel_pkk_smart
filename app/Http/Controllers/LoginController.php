<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

class LoginController extends Controller
{
    public function register(Request $request){
        $incomingFields =$request -> validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        return 'test';
    }
}
