<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        $query = $request->query('filter');
        if ($query) {
            $posts = Post::where('title', "like", '%' . $query . '%')->get();
        }
        return response()->json([
            "success" => true,
            "results" => $posts
        ]);
    }
}
