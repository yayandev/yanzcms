<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = [];

    public function image() : Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('storage/' . $image),
        );
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill');
    }
}
