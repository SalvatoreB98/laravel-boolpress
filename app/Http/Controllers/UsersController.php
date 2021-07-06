<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;

class UsersController extends Controller
{
    function index(Request $request){
        $user = $request->user();
        $userDetails = $request->user()->details;
        $data = [
            "userDetails" => $userDetails,
            "user" =>  $user
        ];
        return view("admin.user",$data);
    }
}
