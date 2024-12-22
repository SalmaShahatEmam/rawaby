<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function show(JobApplication $jobApplication)
    {
        return view('job-applications.show', [
            'jobApplication' => $jobApplication,
        ]);
    }
}
