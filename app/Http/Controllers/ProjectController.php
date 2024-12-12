<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    // @desc Get all projects
    // @route GET /projects
    public function index(): View
    {
        $projects = Project::all();
        return view("projects.index");
    }
}
