<?php

namespace App\Models;

use App\Models\Job;
use App\Models\ApplicationCv;
use App\Models\ExperienceQualification;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducationalQualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'resume'

    ];

    public function getFilePathAttribute()
    {
        return asset('storage' . $this->resume);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
