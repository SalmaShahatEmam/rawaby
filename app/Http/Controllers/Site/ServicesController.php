<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use App\Http\Requests\Site\ServicesOrderRequest;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Actions\Action;

class ServicesController extends Controller
{
    public function index()
    {

        $services = Service::all();
        return view('site.sevices', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        //$otherServices = Service::where('id', '!=', $service->id)->take(3)->get();

        return view('site.service', compact('service'));
    }

    public function order($slug)
    {

        $service = Service::where('slug', $slug)->firstOrFail();

        return view('site.services.order', compact('service'));
    }
    public function order_request(ServicesOrderRequest $request)
    {
       $order= ServiceOrder::create($request->validated());
        Notification::make()
            ->title('يريد العميل ' . $request->name . ' الحصول على خدمة ' . $request->service_name_ar)
            ->actions([
                Action::make('view')
                    ->label('عرض الطلب')
                    ->button()
                    ->url(function ()  use ($order) {
                        return route('filament.admin.resources.service-orders.view', $order->id);
                    })
                    ->markAsRead()

            ])
            // ->broadcast(User::role('admin')->first());
            ->sendToDatabase(User::role('admin')->first());

        event(new DatabaseNotificationsSent(User::role('admin')->first()));


        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
