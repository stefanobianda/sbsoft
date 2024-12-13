<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Section
Route::get('/skilldashboard', [SkillDashboardController::class,'index'])->name('skilldashboard.index');

Route::middleware('auth')->group(function () {
    // Categories
    Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
    // CRUD
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class,'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');

    // Skills
    Route::get('/skills', [SkillController::class,'index'])->name('skills.index');
    // CRUD
    Route::get('/skills/create', [SkillController::class,'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class,'store'])->name('skills.store');
    Route::get('/skills/{skill}', [SkillController::class,'show'])->name('skills.show');
    Route::get('/skills/{skill}/edit', [SkillController::class,'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillController::class,'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class,'destroy'])->name('skills.destroy');

    // Projects
    Route::get('/projects', [ProjectController::class,'index'])->name('projects.index');
    // CRUD
    Route::get('/projects/create', [ProjectController::class,'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class,'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class,'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class,'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class,'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class,'destroy'])->name('projects.destroy');

});