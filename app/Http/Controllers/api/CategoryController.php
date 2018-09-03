<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;

class CategoryController extends Controller
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
        // ===== Category Details ====== //
        $category = Category::where('slug',$slug)
        ->with('posts')
        ->first();
        
        $category->image = env('APP_URL',null).'/storage/'.$category->image;
        
        $posts = [];

        foreach ($category->posts as $key => $post) {
            $img = explode('.',$post->image);
            $post->image = env('APP_URL',null).'/storage/'.$img[0].'-medium.'.$img[1];
            // $post->image = env('APP_URL',null).'/storage/'.$post->image;
            $posts[] = $post;
        }

        $category->posts = $posts;

        $data['category'] = $category;
        return response($data, 200);
    }

}
