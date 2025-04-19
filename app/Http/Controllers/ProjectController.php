<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Role;
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
        return view("projects.create")->with("experiences", Experience::all()->pluck("name","id"));
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
        return view("projects.edit")->with("project", $project)->with("experiences", Experience::all()->pluck("name","id"));;
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
            "experience_id" => "required",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:512',
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
            "experience_id" => "required",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:512',
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

        return redirect()->route("projects.index")->with("success","Project deleted successfully!");
    }

    // @desc manage skills
    // @route GET /projects/{$id}/skills
    public function skills(Project $project): View
    {
        $associatedSkillIds = $project->linkedBySkills()->pluck('skill_id')->toArray();
        $skills = Skill::whereNotIn('id', $associatedSkillIds)->get();
        return view("projects.skills")->with("project", $project)->with("skills", $skills);
    }

    // @desc link skills
    // @route GET /projects/{$id}/skills/{$id}/add
    public function addSkill(Project $project, Skill $skill): RedirectResponse
    {
        if (!$project->linkedBySkills()->where('skill_id', $skill->id)->exists()){
            $project->linkedBySkills()->attach($skill->id);
        }
        return redirect()->route("projects.skills", $project->id)->with("success","Skill linked to project successfully!");
    }

    // @desc unlink skills
    // @route GET /projects/{$id}/skills/{$id}/remove
    public function removeSkill(Project $project, Skill $skill): RedirectResponse
    {
        $project->linkedBySkills()->detach($skill->id);
        return redirect()->route("projects.skills", $project->id)->with("success","Skill removed from project successfully!");
    }

    // @desc manage roles
    // @route GET /projects/{$id}/roles
    public function roles(Project $project): View
    {
        $associatedRoleIds = $project->linkedByRoles()->pluck('role_id')->toArray();
        $roles = Role::whereNotIn('id', $associatedRoleIds)->get();
        return view("projects.roles")->with("project", $project)->with("roles", $roles);
    }

    // @desc link role
    // @route GET /projects/{$id}/roles/{$id}/add
    public function addRole(Project $project, Role $role): RedirectResponse
    {
        if (!$project->linkedByRoles()->where('role_id', $role->id)->exists()){
            $project->linkedByRoles()->attach($role->id);
        }
        return redirect()->route("projects.roles", $project->id)->with("success","Role linked to project successfully!");
    }

    // @desc unlink role
    // @route GET /projects/{$id}/roles/{$id}/remove
    public function removeRole(Project $project, Role $role): RedirectResponse
    {
        $project->linkedByRoles()->detach($role->id);
        return redirect()->route("projects.roles", $project->id)->with("success","Role removed from project successfully!");
    }
}
