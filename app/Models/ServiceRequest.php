<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

   protected  $table = "service_orders";
    protected $fillable = ['name',"email","is_replay",
    "phone","country","company_name","job_title",
    'requestable_type', 'requestable_id', 'message'];


    public function requestable()
    {
        return $this->morphTo();
    }
}
