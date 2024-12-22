<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ar',
        'address',
        'lng',
        'lat',
        'phone',
    ];

    public function getTitleAttribute()
    {
        return $this['title_' . app()->getLocale()];
    }


    public function services()
    {
        return $this->belongsToMany(Service::class, 'branch_service');
    }
}
