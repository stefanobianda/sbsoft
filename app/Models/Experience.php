<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "company",
        "image",
    ] ;

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

}
