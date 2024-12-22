<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory ;
    // SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'slug',
        'images',
        'service_steps_en',
        'service_steps_ar',
        'advantages_en',
        'advantages_ar'
    ];


    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getServiceStepAttribute()
    {
        return $this['service_steps_' . app()->getLocale()];
    }

    public function getAdvantageAttribute()
    {
        return $this['advantages_' . app()->getLocale()];
    }

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
     return $this->images ? asset('storage/' . $this->images) : null;

    }

    public function requests()
    {
        return $this->morphMany(ServiceRequest::class, 'requestable');
    }


}
