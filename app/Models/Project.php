<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Project extends Model
{
    //

    protected $guarded = [];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill');
    }

    public function image() : Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('storage/' . $image),
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('name') && empty($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });
    }
}
