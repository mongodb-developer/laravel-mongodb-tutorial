<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// our new model
use App\Models\Post;

class PostController extends Controller
{
   public function show($slug)
   {
        // our DB query
        $query_result = Post::where('guid', '=', $slug)->first();

        // generated the view defined in [/resources/views]/post.blade.php 
        return view('post', [ 'post_data' => $query_result ]);
   }
}
