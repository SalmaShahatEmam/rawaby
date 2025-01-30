<?php

namespace App\Observers;

use App\Mail\AlphaMail;
use App\Models\BlogUsers;
use Illuminate\Support\Facades\Mail;

class BlogUsersObserver
{
    /**
     * Handle the BlogUsers "created" event.
     */
    public function created(BlogUsers $blogUsers): void
    {
        $data = [
            "reply" => "Thank you for your subscription",
        ];
        Mail::to($blogUsers->email)->send(new AlphaMail($data));
    }

    /**
     * Handle the BlogUsers "updated" event.
     */
    public function updated(BlogUsers $blogUsers): void
    {
        //
    }

    /**
     * Handle the BlogUsers "deleted" event.
     */
    public function deleted(BlogUsers $blogUsers): void
    {
        //
    }

    /**
     * Handle the BlogUsers "restored" event.
     */
    public function restored(BlogUsers $blogUsers): void
    {
        //
    }

    /**
     * Handle the BlogUsers "force deleted" event.
     */
    public function forceDeleted(BlogUsers $blogUsers): void
    {
        //
    }
}
