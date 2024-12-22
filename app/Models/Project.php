<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',
        'address',

        'power',
        'time',
        'products_en',
        'products_ar',
        'feature_en',
        'feature_ar',
        'targets_en',
        'targets_ar'
    ];

    public function getTargetAttribute()
    {
        return $this['targets_' . app()->getLocale()];
    }

    public function getProductAttribute()
    {
        return $this['products_' . app()->getLocale()];
    }

    public function requests()
    {
        return $this->morphMany(ServiceRequest::class, 'requestable');
    }


    public function getFeatureAttribute()
    {
        return $this['feature_' . app()->getLocale()];
    }

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }

    protected $appends = ['image_path'];


    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
    public function getCreatedAtAttribute($value)
    {
        \Carbon\Carbon::setLocale(app()->getLocale());
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }



}
