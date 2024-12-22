<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Slider;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Http\Requests\Site\ContactUsRequest;
use Filament\Notifications\Events\DatabaseNotificationsSent;

class ContacUsController extends Controller
{
    public function index()
    {
        $sliders =  Slider::all();
        return view('site.contact', compact('sliders'));
    }
    public function store(ContactUsRequest $request)
    {
        $contact =  ContactUs::create($request->validated());

        $title = 'يريد العميل ' . $request->name . ' التواصل معك' . ' بخصوص ' . $request->subject . ' وهذا رقمه ' . $request->phone;

        sendNotifyAdmin($title, 'عرض الرساله', route('filament.admin.resources.contacts.view', $contact->id));

        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
