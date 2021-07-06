<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;

class UsersController extends Controller
{
    function index(Request $request){
        $userDetails = $request->user()->details;
        return view("admin.user",compact('userDetails'));
    }
}
