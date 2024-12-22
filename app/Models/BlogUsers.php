<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUsers extends Model
{
    use HasFactory;

    protected $table="blog_users";
    protected $fillable=['email'];
}
