<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    public function index()
    {
        $branches  = Branch::with('services')->get();
        return view('site.branches.index',compact('branches'));
    }
}
