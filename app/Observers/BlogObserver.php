<?php

namespace App\Observers;

use App\Models\Blog;
use App\Models\BlogUsers;
use App\Mail\BlogNotificationMail;
use Illuminate\Support\Facades\Mail;

class BlogObserver
{
    public function created(Blog $blog)
    {
      /*   $users = BlogUsers::all();

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new BlogNotificationMail($blog));
        } */
    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
