<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index()
    {
        $data = [];
        // ===== Posts List ====== //
        $posts = DB::table('posts')
        ->select('excerpt','title','image','slug','created_at')
        ->limit(3)
        ->orderBy('created_at', 'desc')
        ->get();
        $postArray = [];
        foreach ($posts as $key => $post) {
            
            $postArray[] = array(
                'title' => $post->title,
                'description' => $post->excerpt,
                'image' => env('APP_URL',null).'/storage/'.$post->image,
                'slug' => $post->slug,
                'created_at' => $post->created_at
            );
        
        }

        // ===== Category List ====== //
        $categories = DB::table('categories')
        ->select('name','image','slug')
        ->orderBy('name', 'desc')
        ->get();
        $categoryArray = [];
        foreach ($categories as $key => $category) {
            $img = explode('.',$category->image);
            $categoryArray[] = array(
                'title' => $category->name,
                'image' => env('APP_URL',null).'/storage/'.$img[0].'-cropped.'.$img[1],
                // 'image' => env('APP_URL',null).'/storage/'.$category->image,
                'slug' => $category->slug,
            );
        
        }

        // ===== Banner List ===== //

        $banners = DB::table('banners')
        ->select('name','content','image')
        ->orderBy('name', 'desc')
        ->get();
        $bannerArray = [];
        foreach ($banners as $key => $banner) {
            $img = explode('.',$banner->image);
            $bannerArray[] = array(
                'name' => $banner->name,
                'image' => env('APP_URL',null).'/storage/'.$banner->image,
                'content' => $banner->content,
            );
        
        }


        $data['posts'] = $postArray;
        $data['categories'] = $categoryArray;
        $data['banners'] = $bannerArray;
        return response($data, 200);
    }

}
