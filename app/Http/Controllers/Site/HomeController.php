<?php

namespace App\Http\Controllers\Site;


use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\Sector;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Liberary;
use App\Models\Question;
use App\Models\ProductLine;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\ServiceRequest;
use App\Models\StudyDestination;
use App\Models\TouristDestination;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Http\Requests\Site\ContactUsRequest;
use App\Http\Requests\Site\ServiceApplicationRequest;
use Filament\Notifications\Events\DatabaseNotificationsSent;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $services = Service::get();
        $partners = Partner::all();
        $products = Product::all();
        $projects = Project::all();
        $partners = Partner::all();
        $blogs = Blog::take(4)->get();
        $questions = Question::all();


        return view('site.home', compact('sliders','products','partners','questions', 'services','projects', 'partners','blogs'));
    }




    public function contact_request(ContactUsRequest $request)
    {

        $contact = Contact::create($request->validated());


      /*   Notification::make()
            ->title('يريد العميل ' . $request->name . ' التواصل معك')
            ->actions([
                Action::make('view')
                    ->label('عرض الرسالة')
                    ->button()
                    ->url(function () use ($contact) {
                        return route('filament.admin.resources.contacts.view', $contact->id);
                    })
                    ->markAsRead()

            ])
            // ->broadcast(User::role('admin')->first());
            ->sendToDatabase(User::role('admin')->first());

        event(new DatabaseNotificationsSent(User::role('admin')->first())); */


        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }


    public function lang($lang)
    {

        session()->put('lang', $lang);
        return redirect()->back();
    }


    public function targetSectors()
    {
        $sectors = Sector::all();

        return view('site.targetsector',compact('sectors'));
    }

    public function jobs()
    {
        $jobs = Job::latest()->get();

        return view('site.jobs',compact('jobs'));
    }


    public function allQuestions()
    {
        $questions = Question::all();

        return view('site.questions',compact('questions'));

    }


    public function productlines()
    {
        $productlines = ProductLine::all();

        return view('site.productLines',compact('productlines'));

    }

    public function liberary()
    {
        $liberary = Liberary::latest()->first();

        return view('site.liberaries',compact('liberary'));

    }

    public function requestType(Request $request)
    {
      if($request->type == "null")
      {
        return response()->json([
          "result"=>null
        ]);
      }
      elseif($request->type == "products")
      {
          $result = Product::all();
      }
      elseif($request->type == "projects")
      {
          $result = Project::all();
      }
      elseif($request->type == "services")
      {
          $result = Service::all();
      }

      return response()->json([
        "result"=>$result
      ]);


    }

    public function requestServices($type = null  , $slug = null)
    {
        if($slug && $type){

            $model = match ($type) {
                'products' => Product::class,
                'projects' => Project::class,
                'services' => Service::class,
                default => null,
            };

            $resource = $model::where('slug',$slug)->first();

            $all_models = $model::all();

            return view('site.request', compact('resource' ,'type' ,'all_models'));
        }
        return view('site.request');

    }

    public function requestApplication(ServiceApplicationRequest $request)
    {
        $data = $request->all();

        $model = match ($request->type) {
            'products' => Product::class,
            'projects' => Project::class,
            'services' => Service::class,
            default => null,
        };

       // abort_if(!$model, 422, 'Invalid request type');

        $resource = $model::findOrFail($request->id);

        $serviceRequest = $resource->requests()->create($data);

        return response()->json();
    }


}
