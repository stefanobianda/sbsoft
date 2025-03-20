<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image",
    ] ;

    public function linkedByProjects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_roles')->withTimestamps();
    }

}
