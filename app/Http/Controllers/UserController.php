<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{


    public function getUsers(){

        $users = User::all();

        return  response()->json([
            'code'      => 200,
            'status'    => 'success',
            'users'      => $users
        ]);

    }
}
