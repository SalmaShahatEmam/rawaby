<?php

namespace App\Models;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducationalQualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    // protected $table="mcc_jobs";
    protected $fillable = [
        'title_en',
        'title_ar',
        'section_en',
        'section_ar',
        'hours',
        "slug",
        'expertise_en',
        'expertise_ar',
        'work_type_en',
        'work_type_ar',
        'core_tasks_en',
        'core_tasks_ar',
        'required_skills_en',
        'required_skills_ar',
        'advantages_en',
        'advantages_ar'
    ];

    public function getExpertiseAttribute()
    {
        return $this['expertise_' . app()->getLocale()];
    }

    public function getWorkTypeAttribute()
    {
        return $this['work_type_' . app()->getLocale()];
    }

    public function getCoreTasksAttribute()
    {
        return $this['core_tasks_' . app()->getLocale()];
    }

    public function getRequiredSkillsAttribute()
    {
        return $this['required_skills_' . app()->getLocale()];
    }

    public function getAdvantagesAttribute()
    {
        return $this['advantages_' . app()->getLocale()];
    }
    public function getTitleAttribute()
    {
        return $this['title_' . app()->getLocale()];
    }


    public function getSectionAttribute()
    {
        return $this['section_' . app()->getLocale()];
    }


    public function Applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
