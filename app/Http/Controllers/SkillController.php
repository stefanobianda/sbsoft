<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view("skills.edit")->with("skill", $skill)->with("categories", Category::all()->pluck("name","id"));
    }

    // @desc Save the new skill
    // @route POST /skills
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:512',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Store the file
            $path = $request->file('image')->store('skills', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $skill = Skill::create($validatedData);

        return redirect()->route("skills.index")->with("success","Skill created successfully!");
    }

    // @desc Update the existing skill
    // @route PUT /skills/{$id}
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:512',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Delete old logo
            if ($skill->image) {
                if (Storage::disk('public')->exists($skill->image)) {
                    Storage::disk('public')->delete($skill->image);
                }
            }
            
            // Store the file
            $path = $request->file('image')->store('skills', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $skill->update($validatedData);

        return redirect()->route("skills.show", $skill->id)->with("success","Skill updated successfully!");
    }

    // @desc delete a skill
    // @route DELETE /skills/{$id}    
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route("skills.index")->with("success","Skill deleted successfully!");
    }

    // @desc manage projects
    // @route GET /skills/{$id}/projects
    public function projects(Skill $skill): View
    {
        $associatedProjectIds = $skill->linkedByProjects()->pluck('project_id')->toArray();
        $projects = Project::whereNotIn('id', $associatedProjectIds)->get();
        return view("skills.projects")->with("skill", $skill)->with("projects", $projects);
    }

    // @desc link project
    // @route GET /skills/{$id}/projects/{$id}/add
    public function addProject(Skill $skill, Project $project): RedirectResponse
    {
        if (!$skill->linkedByProjects()->where('project_id', $project->id)->exists()){
            $skill->linkedByProjects()->attach($project->id);
        }
        return redirect()->route("skills.projects", $skill->id)->with("success","Project linked to skill successfully!");
    }

    // @desc unlink skills
    // @route GET /skills/{$id}/projects/{$id}/remove
    public function removeProject(Skill $skill, Project $project): RedirectResponse
    {
        $skill->linkedByProjects()->detach($project->id);
        return redirect()->route("skills.projects", $skill->id)->with("success","Project removed from skill successfully!");
    }

}
