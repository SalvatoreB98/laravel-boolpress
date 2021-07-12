<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class MainController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::all()->sortByDesc('created_at')
        ];
        return view('public',$data);
    }
}
