<?php

namespace App\Models;

use App\Models\Estate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_number',
        'name',
        'email',
        'phone',
        'estate_id',
        'status',
        'price',

    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
}
