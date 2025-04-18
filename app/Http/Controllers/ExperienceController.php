<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    // @desc Get all experiences
    // @route GET /experiences
    public function index(): View
    {
        $experiences = Experience::all();
        return view("experiences.index")->with("experiences", $experiences);
    }

    // CRUD section
    // @desc Show create experience form
    // @route GET /experiences/create
    public function create(): View
    {
        return view("experiences.create");
    }

    // @desc Show a single experience
    // @route GET /experiences/{$id}
    public function show(Experience $experience): View
    {
        return view("experiences.show")->with("experience", $experience);
    }

    // @desc Show edit experience form
    // @route GET /experiences/{$id}/edit
    public function edit(Experience $experience): View
    {
        return view("experiences.edit")->with("experience", $experience);
    }

    // @desc Save the new experience
    // @route POST /experiences
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:64",
            "description"=> "string|max:255",
            "company"=> "string|max:64",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Store the file
            $path = $request->file('image')->store('experiences', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $experience = Experience::create($validatedData);

        return redirect()->route("experiences.index")->with("success","Experience created successfully!");
    }


    // @desc Update the existing experience
    // @route PUT /experiences/{$id}
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:64",
            "description"=> "nullable|string|max:255",
            "company"=> "nullable|string|max:64",
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:512',
        ]);

        // Check for image
        if ($request->hasFile('image')) {
            // Delete old logo
            if ($experience->image) {
                if (Storage::disk('public')->exists($experience->image)) {
                    Storage::disk('public')->delete($experience->image);
                }
            }
            
            // Store the file
            $path = $request->file('image')->store('experiences', 'public');
            // Add path to validated data
            $validatedData['image'] = $path;
        }

        $experience->update($validatedData);

        return redirect()->route("experiences.show", $experience->id)->with("success","Experience updated successfully!");
    }

    // @desc delete a experience
    // @route DELETE /experiences/{$id}    
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()->route("experiences.index")->with("success","Experience deleted successfully!");
    }

}
