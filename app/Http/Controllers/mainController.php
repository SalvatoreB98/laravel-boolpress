<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class mainController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::all()
        ];
        return view('public',$data);
    }
}
