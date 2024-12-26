<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',
        'advantages_en',
        'advantages_ar',
        'applications_en',
        'applications_ar',
        'feature_en',
        'feature_ar'
    ];

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }
    public function getAdvantageAttribute()
    {
        return $this['advantages_' . app()->getLocale()];
    }
    public function getApplicationAttribute()
    {
        return $this['applications_' . app()->getLocale()];
    }
    public function getFeatureAttribute()
    {
        return $this['feature_' . app()->getLocale()];
    }

    protected $appends = ['image_path'];


    public function requests()
    {
        return $this->morphMany(ServiceRequest::class, 'requestable');
    }
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
