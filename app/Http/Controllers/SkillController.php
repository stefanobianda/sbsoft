<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    // @desc Get all skills
    // @route GET /skills
    public function index(): View
    {
        $skillCategories = Category::all();
        return view("skills.index")->with("skillCategories", $skillCategories);
    }
}
