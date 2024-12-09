<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    // @desc Get all skills
    // @route GET /skills
    public function index(): View
    {
        $skills = Skill::all();
        return view("skills.index")->with("skills", $skills);
    }

    // CRUD section
    // @desc Show create skill form
    // @route GET /skills/create
    public function create(): View
    {
        return view("skills.create")->with("categories", Category::all()->pluck("name","id"));
    }

    // @desc Show a single skill
    // @route GET /skills/{$id}
    public function show(Skill $skill): View
    {
        return view("skills.show")->with("skill", $skill);
    }

    // @desc Show edit skill form
    // @route GET /skills/{$id}/edit
    public function edit(Skill $skill): View
    {
        return view("skills.edit")->with("skill", $skill)
                                        ->with("categories", Category::all()->pluck("name","id"));
    }

    // @desc Save the new category
    // @route POST /categories
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
            'category_id' => 'required|exists:categories,id',
        ]);

        $skill = Skill::create($validatedData);

        return redirect()->route("skills.index")->with("success","Skill created successfully!");
    }

    // @desc Update the existing category
    // @route PUT /categories/{$id}
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
            'category_id' => 'required|exists:categories,id',
        ]);

        $skill->update($validatedData);

        return redirect()->route("skills.index")->with("success","Skill updated successfully!");
    }

    // @desc delete a category
    // @route DELETE /categories/{$id}    
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route("skilldashboard.index")->with("success","Skill deleted successfully!");
    }

}
