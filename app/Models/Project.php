<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "shortDescription",
        "role",
        "description",
        "company",
        "image",
        "experience_id",
    ] ;

    public function skills(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
    public function linkedBySkills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'projects_skills')->withTimestamps();
    }

    public function linkedByRoles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'projects_roles')->withTimestamps();
    }

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }

}
