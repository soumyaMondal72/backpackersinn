<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {
        $data = [];
        // ===== Post Details ====== //
        $post = DB::table('posts')
        ->where('slug',$slug)
        ->first();

        $post->image = env('APP_URL',null).'/storage/'.$post->image;
        

        $data['post'] = $post;
        return response($data, 200);
    }

}
