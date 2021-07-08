<?php


namespace App\Http\Controllers;
use App\User;
use App\Mail\AdminEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function index(){
        return view('sendMail');
    }
    function send(Request $request){
        $data = $request->all();
        $admin = User::findOrFail(1);
        Mail::to($admin['email'])->send(new AdminEmail($data));
        return redirect("public");
    }
}
