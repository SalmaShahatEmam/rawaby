<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('site.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $services = Service::where('slug', '!=', $slug)->get();
        return view('site.services.show', compact('service', 'services'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'message' => 'required',
            'service_id' => 'required|exists:services,id',
            'service_name' => 'required',
        ]);

        $order =  ServiceOrder::create($request->all());

        $title = 'يريد العميل ' . $request->name . ' التواصل معك بخصوص طلب الخدمة ' . $request->service_name . '. ورقم الهاتف هو ' . $request->phone . '.';

        sendNotifyAdmin($title, 'عرض الطلب', route('filament.admin.resources.service-orders.view', $order->id));

        return response()->json(['success' => __('تم ارسال الطلب بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
