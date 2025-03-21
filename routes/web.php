<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

    // Skills CRUD
    Route::get('/skills/create', [SkillController::class,'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class,'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class,'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillController::class,'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class,'destroy'])->name('skills.destroy');
    // Manage project
    Route::get('/skills/{skill}/projects', [SkillController::class, 'projects'])->name('skills.projects');
    Route::delete('/skills/{skill}/projects/{project}/remove', [SkillController::class, 'removeProject'])->name('skills.projects.remove');
    Route::post('/skills/{skill}/projects/{project}/add', [SkillController::class, 'addProject'])->name('skills.projects.add');

    // Roles CRUD
    Route::get('/roles/create', [RoleController::class,'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class,'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class,'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class,'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class,'destroy'])->name('roles.destroy');
    // Manage project
    Route::get('/roles/{role}/projects', [RoleController::class, 'projects'])->name('roles.projects');
    Route::delete('/roles/{role}/projects/{project}/remove', [RoleController::class, 'removeProject'])->name('roles.projects.remove');
    Route::post('/roles/{role}/projects/{project}/add', [RoleController::class, 'addProject'])->name('roles.projects.add');
    
    
    // Projects CRUD
    Route::get('/projects/create', [ProjectController::class,'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class,'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class,'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class,'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class,'destroy'])->name('projects.destroy');
    // Manage skill
    Route::get('/projects/{project}/skills', [ProjectController::class, 'skills'])->name('projects.skills');
    Route::delete('/projects/{project}/skills/{skill}/remove', [ProjectController::class, 'removeSkill'])->name('projects.skills.remove');
    Route::post('/projects/{project}/skills/{skill}/add', [ProjectController::class, 'addSkill'])->name('projects.skills.add');
    // Manage role
    Route::get('/projects/{project}/roles', [ProjectController::class, 'roles'])->name('projects.roles');
    Route::delete('/projects/{project}/roles/{role}/remove', [ProjectController::class, 'removeRole'])->name('projects.roles.remove');
    Route::post('/projects/{project}/roles/{role}/add', [ProjectController::class, 'addRole'])->name('projects.roles.add');
});

// Dashboard Section
Route::get('/skilldashboard', [SkillDashboardController::class,'index'])->name('skilldashboard.index');

// Skills
Route::get('/skills', [SkillController::class,'index'])->name('skills.index');
Route::get('/skills/{skill}', [SkillController::class,'show'])->name('skills.show');

// Roles
Route::get('/roles', [RoleController::class,'index'])->name('roles.index');
Route::get('/roles/{role}', [RoleController::class,'show'])->name('roles.show');

// Projects
Route::get('/projects', [ProjectController::class,'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class,'show'])->name('projects.show');

