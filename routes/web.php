<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

// Project Section
Route::get('/projects', [ProjectController::class,'index'])->name('projects.index');

// Skills Section
Route::get('/skills', [SkillController::class,'index'])->name('skills.index');
