<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillDashboardController extends Controller
{
    // @desc Get all skills
    // @route GET /skilldashboard
    public function index(): View
    {
        $skillCategories = Category::all();
        return view("skilldashboard.index")->with("skillCategories", $skillCategories);
    }
}
