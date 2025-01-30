<?php

namespace App\Models;

use App\Observers\BlogUsersObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//#[ObservedBy([BlogUsersObserver::class])]
class BlogUsers extends Model
{
    use HasFactory;

    protected $table="blog_users";
    protected $fillable=['email'];
}
