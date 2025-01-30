<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\BlogUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(2);
        $recent_blogs = Blog::orderBy('id', 'DESC')->take(4)->get();

        return view('site.blogs', compact('blogs', 'recent_blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recent_blogs = Blog::orderBy('id', 'DESC')->where('slug', '!=', $slug)->take(3)->get();
        return view('site.blogDetails', compact('blog', 'recent_blogs'));
    }


    public function blogUser(Request $request)
    {
        $request->validate(['email'=>"required|email|unique:blog_users,email"] ,[
            'email.unique' => __('This email is already Subsercriped.'),
        ] );

        BlogUsers::create($request->all());

        session()->flash('success', __('You have successfully subscribed to the newsletter service'));
        return response()->json();
    }
}
