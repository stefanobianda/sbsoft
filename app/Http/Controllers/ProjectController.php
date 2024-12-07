<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    // @desc Get all projects
    // @route GET /projects
    public function index(): View
    {
        return view("projects.index");
    }
}
