<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RoleController extends Controller
{
    // @desc Get all skills
    // @route GET /skills
    public function index(): View
    {
        $roles = Role::all();
        return view("roles.index")->with("roles", $roles);
    }

    // CRUD section
    // @desc Show create role form
    // @route GET /roles/create
    public function create(): View
    {
        return view("roles.create");
    }

    // @desc Show a single role
    // @route GET /roles/{$id}
    public function show(Role $role): View
    {
        return view("roles.show")->with("role", $role);
    }

    // @desc Show edit role form
    // @route GET /roles/{$id}/edit
    public function edit(Role $role): View
    {
        return view("roles.edit")->with("role", $role);
    }

    // @desc Save the new role
    // @route POST /roles
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:256",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Store the file
            $path = $request->file('image')->store('roles', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $role = Role::create($validatedData);

        return redirect()->route("roles.index")->with("success","Role created successfully!");
    }

    // @desc Update the existing role
    // @route PUT /roles/{$id}
    public function update(Request $request, Role $role): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:256",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Delete old logo
            if ($role->image) {
                if (Storage::disk('public')->exists($role->image)) {
                    Storage::disk('public')->delete($role->image);
                }
            }
            
            // Store the file
            $path = $request->file('image')->store('roles', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $role->update($validatedData);

        return redirect()->route("roles.show", $role->id)->with("success","Role updated successfully!");
    }

    // @desc delete a role
    // @route DELETE /roles/{$id}    
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route("roles.index")->with("success","Role deleted successfully!");
    }

}
