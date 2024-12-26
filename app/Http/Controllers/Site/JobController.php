<?php

namespace App\Http\Controllers\Site;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\JobApplicationRequest;
use App\Models\JobApplication;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();

        return view('site.jobs',compact('jobs'));
    }


    public function show($slug)
    {
        $job = Job::where('slug',$slug)->firstOrFail();

        return view('site.jobDetails',compact('job'));

    }


    public function apply($slug)
    {
        //first or fail to return 404 if job not found
      //  $job = Job::where('slug',$slug)->first();
      $job = Job::where('slug',$slug)->firstOrFail();

        return view('site.jobApplicaions',compact('job'));

    }


    public function submitApplication(JobApplicationRequest $request)
    {

        if ($request->hasFile('resume')) {

          //  $resume_path = $request->resume->store('resume');
            $resume_path = $request->file('resume')->store('resume', 'public');

            JobApplication::create([
                'name' =>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'city'=>$request->city,
                'job_id'=>$request->job_id,
                'phone'=>$request->phone,
                'resume'=>$resume_path
            ]);
        }

       /*  session()->flash('status', 'error');
        session()->flash('message', 'حدث خطأ، حاول مرة أخرى!');
 */
        return response()->json();

    }
}
