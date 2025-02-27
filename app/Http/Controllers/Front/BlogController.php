<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Cookie; 
use Illuminate\Support\Facades\Cookie;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $lang = Cookie::get('lang');

        // return $blogs;


        return view('front.blog.index', [
            'blogs' => $blogs,
            'lang' => $lang,
        ]);
    }

    public function getBlog()
    {
        $blogs = Blog::all();
        return $blogs;
    }

    public function detailBlog($slug) {
        $chitiet = Blog::where('slug', $slug)->first();
        $lang = Cookie::get('lang');

        
        return view('front.blog.detail', [
            'chitiet' => $chitiet,
            'lang' => $lang,
        ]);
    }
}
