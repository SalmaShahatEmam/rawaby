<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'job_title_ar', 'job_title_en', 'image'];


    protected $appends = ['image_path'];

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getJobTitleAttribute()
    {
        return $this['job_title_' . app()->getLocale()];
    }



    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
