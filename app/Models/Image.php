<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'product_id',
    ];

    protected $appends = ['image_path'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->path);
    }


}
