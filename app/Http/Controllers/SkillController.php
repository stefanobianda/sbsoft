<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    // @desc Get all skills
    // @route GET /skills
    public function index(): View
    {
        return view("skills.index");
    }
}
