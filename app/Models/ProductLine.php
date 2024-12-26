<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLine extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',

        'feature_en',
        'feature_ar',
        'advantages_en',
        'advantages_ar',
        'product_en',
        'product_ar'
    ];

    public function getAdvantageAttribute()
    {
        return $this['advantages_' . app()->getLocale()];
    }

    public function getProductAttribute()
    {
        return $this['product_' . app()->getLocale()];
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
   /*  public function getCreatedAtAttribute($value)
    {
        \Carbon\Carbon::setLocale(app()->getLocale());
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    } */
}
