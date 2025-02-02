<?php

namespace App\Models;

use App\Models\Estate;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'icon',
    ];

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getIconPathAttribute()
    {
        return asset('storage/' . $this->icon);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class ,"product_category");
    }


    public function productCount()
    {
        return $this->products->count();
    }
}
