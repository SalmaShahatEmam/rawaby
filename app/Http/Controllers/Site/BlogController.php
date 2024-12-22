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
        $blogs = Blog::paginate(1);
        $other_blogs = Blog::take(3)->get();

        return view('site.news', compact('blogs', 'other_blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $other_blogs = Blog::where('slug', '!=', $slug)->take(3)->get();
        return view('site.blogDetails', compact('blog', 'other_blogs'));
    }


    public function blogUser(Request $request)
    {
        $request->validate(['email'=>"required|email|unique:blog_users,email"],[
            'email.required' => __('The email field is required.'),
            'email.email' => __('The email must be a valid email address.'),
            'email.unique' => __('This email is already taken.'),
        ]);

        BlogUsers::create($request->all());

        session()->flash('success', __('You have successfully subscribed to the newsletter service'));
        return response()->json();
    }
}
