<?php

namespace App\Http\Controllers\Site;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Estate;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Site\reviewsRequest;

class RetreatPageController extends Controller
{
    public function index()
    {
        $retreats_count = Estate::isCompleted()
                            ->approved()
                            ->count();


        $retreats = Estate::isCompleted()
                            ->approved()
                            ->city(Request()->city)
                            ->get();
        $categories = Category::all();

        return view('site.retreat.index' , compact('retreats' , 'categories' , 'retreats_count'));
    }

    public function show($slug)
    {
        $retreat = Estate::approved()->with(['images'])->withCount(['images'])->where('slug', $slug)
            ->isCompleted()
            ->firstOrFail();

        $retreats = Estate::approved()->isCompleted()->with(['images' => function ($query) {
            $query->first();
        }])->where('category_id', $retreat->category_id)->take(6)->get();




        return view('site.retreat.show', compact('retreat', 'retreats'));
    }

    public function filter(Request $request)
    {
        $retreats_count = Estate::isCompleted()
        ->approved()
        ->count();

        $sort = $request->sort;

            $retreats = Estate::approved()
                ->category($request->category_id)
                ->city($request->city)
                ->rooms($request->rooms)
                ->baths($request->baths)
                ->priceRange($request->min_price, $request->max_price)
                ->areaRange($request->min_area, $request->max_area)
                ->sort($request->sort)
                ->type($request->type)
                ->isCompleted()
                ->get();
       
       return view('site.retreat.render' , compact('retreats','sort' , 'retreats_count'))->render();


    }


    public function create(){

        return view('site.retreat.create');
    }

    public function pay(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'retreat_id' => 'required|exists:estates,id',
        ]);
        $retreat = Estate::approved()->isCompleted()->findOrFail($request->retreat_id);


        if (count($retreat->orders->where('status', 'pending')->where('phone', $request->phone)) > 0) {
            return response()->json(['error' => __('لقد قمت بارسال طلب لهذا العقار مسبقا وسوف يتم الرد عليك في اقرب وقت')], 422);
        }


        $order =  Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'estate_id' => $retreat->id,
            'price' => $retreat->price,
            'status' => 'pending',
            'order_number' => '#' . strtoupper(uniqid()),


        ]);

        $title = 'يريد العميل ' . $request->name . ' التواصل معك بخصوص طلب العقار ' . $retreat->name . '. ورقم الهاتف هو ' . $request->phone . '.';

        sendNotifyAdmin($title, 'عرض الطلب', route('filament.admin.resources.orders.view', $order->id));

        return response()->json(['success' => __('تم ارسال الطلب بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
