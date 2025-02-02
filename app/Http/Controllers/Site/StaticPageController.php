<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Question;
use App\Models\Institute;
use App\Models\Regulations;
use Illuminate\Http\Request;
use App\Http\Middleware\Lang;
use App\Models\LanguageStudy;
use App\Models\StudyDestination;
use App\Settings\GeneralSettings;
use App\Models\RegulationCategory;
use App\Models\TouristDestination;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function about()
    {
        $partners = Partner::all();
        $features = Feature::all();
        $questions = Question::all();
        return view('site.about' , compact('partners','features','questions'));
    }





    public function partners()
    {
        $partners = Partner::all();
        return view('site.partners', compact('partners'));
    }

    public function regulations()
    {
        $regulationsCategory = RegulationCategory::whereHas('regulations')->with('regulations')->withCount('regulations')->latest()->get();

        return view('site.regulations.index', compact('regulationsCategory'));
    }




    public function contact()
    {
        return view('site.contact');
    }
}
