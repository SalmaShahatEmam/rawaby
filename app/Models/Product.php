<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'discount'

    ];

    public function sizes() :HasMany
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class, 'product_id', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class ,"product_category");
    }

    public function getPriceAfterDiscountAttribute()
    {
        return $this['price'] - ($this['discount'] * $this['price']  /100 );
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
}
