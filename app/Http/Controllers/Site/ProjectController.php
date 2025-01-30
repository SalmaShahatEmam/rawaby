<?php

namespace App\Http\Controllers\Site;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(4);
        return view('site.projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $other_projects = Project::orderBy('id', 'DESC')->where('slug', '!=', $slug)->take(3)->get();
        return view('site.project', compact('project', 'other_projects'));
    }
}
