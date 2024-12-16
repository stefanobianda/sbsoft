<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    // @desc Get all projects
    // @route GET /projects
    public function index(): View
    {
        $projects = Project::all();
        return view("projects.index")->with("projects", $projects);
    }

    // CRUD section
    // @desc Show create project form
    // @route GET /projects/create
    public function create(): View
    {
        return view("projects.create");
    }

    // @desc Show a single project
    // @route GET /projects/{$id}
    public function show(Project $project): View
    {
        return view("projects.show")->with("project", $project);
    }

    // @desc Show edit project form
    // @route GET /projects/{$id}/edit
    public function edit(Project $project): View
    {
        return view("projects.edit")->with("project", $project);
    }

    // @desc Save the new project
    // @route POST /projects
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "shortDescription"=> "string|max:100",
            "role"=> "string|max:100",
            "description"=> "nullable|string|max:100",
            "company"=> "nullable|string|max:30",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Store the file
            $path = $request->file('image')->store('projects', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $project = Project::create($validatedData);

        return redirect()->route("projects.index")->with("success","Project created successfully!");
    }


    // @desc Update the existing project
    // @route PUT /projects/{$id}
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "shortDescription"=> "string|max:100",
            "role"=> "string|max:100",
            "description"=> "nullable|string|max:100",
            "company"=> "nullable|string|max:30",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Delete old logo
            if ($project->image) {
                if (Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
            }
            
            // Store the file
            $path = $request->file('image')->store('projects', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $project->update($validatedData);

        return redirect()->route("projects.show", $project->id)->with("success","Project updated successfully!");
    }

    // @desc delete a project
    // @route DELETE /projects/{$id}    
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route("projects.index")->with("success","Skill deleted successfully!");
    }

    // @desc manage skills
    // @route GET /projects/{$id}/skills
    public function skills(Project $project): View
    {
        $skills = Skill::all();
        return view("projects.skills")->with("project", $project)->with("skills", $skills);
    }

    // @desc link skills
    // @route GET /projects/{$id}/skills/{$id}/add
    public function addSkill(Project $project, Skill $skill): View
    {
        if (!$project->linkedBySkills()->where('skill_id', $skill->id)->exists()){
            $project->linkedBySkills()->attach($skill->id);
        }
        $skills = Skill::all();
        return view("projects.skills")->with("project", $project)->with("skills", $skills);
    }

    // @desc unlink skills
    // @route GET /projects/{$id}/skills/{$id}/remove
    public function removeSkill(Project $project, Skill $skill): View
    {
        $project->linkedBySkills()->detach($skill->id);
        $skills = Skill::all();
        return view("projects.skills")->with("project", $project)->with("skills", $skills);
    }
}
