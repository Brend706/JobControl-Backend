<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $req){
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return $req->input();
    }

    function login(Request $req){

        $user = User::where('email', $req->email)->first();
        if( !$user || !Hash::check($req->password, $user->password)){
            return ["error" => "Email or password is incorrect !"];
        }
        return $user;
    }

    public function search(Request $req)
    {
        //Muestra el usuario con ese ID
        //$user = User::find($id);
        $user = User::where('email', $req->email)->first();
        if( !$user){
            return ["error" => "USER NOT FOUND !"];
        }

        return $user;
    }

    public function show($id)
    {
        //Muestra el user con ese ID
        $user = User::find($id);
        return $user;
    }
}
