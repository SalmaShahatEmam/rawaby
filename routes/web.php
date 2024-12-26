<?php
use App\Mail\BlogNotificationMail;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Site\JobController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\BrancheController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\ServicesController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Site\StaticPageController;
use App\Http\Controllers\Site\ContractsPlatformController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/run-queue',function(){
    Artisan::call('queue:work', [
        '--tries' => 3,
        '--timeout' => 60,
    ]);
} );
 */
/* Route::get('/run-optimize',function(){
    Artisan::call('optimize');

} ); */

 Route::get('/toggle-language/{lng}', function ($lng) {

    if($lng=='ar'){
        session()->put('lang', 'en');

    }else{
        session()->put('lang', 'ar');

    }
    return redirect()->back();

  //  return response()->json(['success' => true, 'locale' => $lng]);
});

Route::get('/job-applications/{jobApplication}', [JobApplicationController::class, 'show'])
    ->name('job-applications.show');
Route::namespace('Site')->name('site.')->middleware('lang')->group(function () {
    // -------------------------------- Home Page Routes --------------------------------//
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::post('service-request', [HomeController::class,'service_request'])->name('service.request');
    Route::post('contact-request', [HomeController::class,'contact_request'])->name('contact.request');
    Route::get('branches', [BrancheController::class,'index'])->name('branches');
    Route::post('blog/user',[BlogController::class,"blogUser"])->name('blog.user');
    //-------------------------------- End Home Page Routes ------------------------------//


    // -------------------------------- Static Page Routes --------------------------------//


    //-------------------------------- About Page Routes ------------------------------//
    Route::get('about', [StaticPageController::class,'about'])->name('about');
    //---------------------------------- End About Page Routes ------------------------------//

        // -------------------------------- Target sectors Routes --------------------------------//
    Route::get('targetSectors', [HomeController::class,'targetSectors'])->name('sector');
    Route::get('Liberary', [HomeController::class,'liberary'])->name('liberary');
    Route::get('jobs/apply/{slug}', [JobController::class,'apply'])->name('jobs.apply');
    Route::get('jobs/{slug}', [JobController::class,'show'])->name('jobs.show');
    Route::get('jobs', [JobController::class,'index'])->name('jobs');

    Route::post('jobs/apply', [JobController::class,'submitApplication'])->name('jobs.submitApplication');

    Route::get('request/{type?}/{slug?}', [HomeController::class,'requestServices'])->name('request');
    Route::post('request/apply', [HomeController::class,'requestApplication'])->name('request.apply');
    Route::post('get/type', [HomeController::class,'requestType'])->name('request.type');

    //-------------------------------- Product Page Routes ------------------------------//
    Route::get('products', [ProductController ::class,'index'])->name('products');

    Route::get('products/show/{slug}', [ProductController::class,'show'])->name('products.show');

    //---------------------------------- End Product Page Routes ------------------------------//
    Route::get('questions', [HomeController::class,'allQuestions'])->name('questions');
    Route::get('productlines', [HomeController::class,'productlines'])->name('productlines');

    //-------------------------------- Services Page Routes ------------------------------//
    Route::get('services', [ServicesController::class,'index'])->name('services');
    Route::get('services/show/{slug}', [ServicesController::class,'show'])->name('services.show');
    Route::get('services/order/{slug}', [ServicesController::class,'order'])->name('services.order');
    Route::post('services/order', [ServicesController::class,'order_request'])->name('services.order.request');
    //---------------------------------- End Services Page Routes ------------------------------//


    //---------------------------------- Contact Page Routes ------------------------------//
    Route::get('contact', [StaticPageController::class,'contact'])->name('contact');
    //---------------------------------- End Contact Page Routes ------------------------------//

   /*  Route::get('email/send',function(){
        Mail::to("salmaemam52@gmail.com")->send(new BlogNotificationMail(['name'=>"salma","code"=>"12365"]));

    }); */


    //----------------------------------- Projects Page Routes ------------------------------//
    Route::get('projects', [ProjectController ::class,'index'])->name('projects');
    Route::get('projects/show/{slug}', [ProjectController ::class,'show'])->name('projects.show');
    //----------------------------------- End Projects Page Routes ------------------------------//


    //----------------------------------- Blog Page Routes ------------------------------//
    Route::get('blogs', [BlogController ::class,'index'])->name('blogs');
    Route::get('blogs/show/{slug}', [BlogController ::class,'show'])->name('blogs.show');
    Route::post('blog/user',[BlogController::class,"blogUser"])->name('blog.user');

    //----------------------------------- End Blog Page Routes ------------------------------//

    //----------------------------------- Partners Page Routes ------------------------------//
    Route::get('partners', [StaticPageController::class,'partners'])->name('partners');
    //----------------------------------- End Partners Page Routes ------------------------------//

    //------------------------------------ Regulations Page Routes ------------------------------//
    Route::get('regulations', [StaticPageController::class,'regulations'])->name('regulations');
    //------------------------------------ End Regulations Page Routes ------------------------------//


    //------------------------------------ Contracts Platform Page Routes ------------------------------//
    Route::get('contracts-platform', [ContractsPlatformController::class,'index'])->name('contracts.platform');
    //------------------------------------ End Contracts Platform Page Routes ------------------------------//
    // Route::get('courses', [StaticPageController::class,'courses'])->name('courses');
    //-------------------------------- End Static Page Routes ------------------------------//
    Route::get('/lang/{lang}', [HomeController::class,'lang'])->name('lang');
});

