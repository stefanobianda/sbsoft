<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AchievementController extends Controller
{
    // CRUD section
    // @desc Show create achievement form
    // @route GET /experiences/{experience}/achievements/create
    public function create(Experience $experience): View
    {
        return view("achievements.create")->with("experience", $experience);
    }

    // @desc Show edit achievement form
    // @route GET /experiences/{experience}/achievements/{$id}/edit
    public function edit(Experience $experience, Achievement $achievement): View
    {
        return view("achievements.edit")->with("achievement", $achievement)->with("experience", $experience);
    }

    // @desc Save the new achievement
    // @route POST /experiences/{experience}/achievements
    public function store(Request $request, Experience $experience): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:255",
            "description"=> "string|max:10000",
            "experience_id" => "required|integer|exists:experiences,id",
        ]);

        $achievement = Achievement::create($validatedData);

        return redirect()->route("experiences.show", $experience)->with("success","Achievement created successfully!");
    }


    // @desc Update the existing achievement
    // @route PUT /experiences/{experience}/achievements/{$id}
    public function update(Request $request, Experience $experience, Achievement $achievement): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:255",
            "experience_id" => "required|integer|exists:experiences,id",
        ]);

        $achievement->update($validatedData);

        return redirect()->route("experiences.show", $experience)->with("success","Achievement updated successfully!");
    }

    // @desc delete a achievement
    // @route DELETE /experiences/{experience}/achievements/{$id}    
    public function destroy(Experience $experience, Achievement $achievement): RedirectResponse
    {
        $achievement->delete();

        return redirect()->route("experiences.show", $experience)->with("success","Achievement deleted successfully!");
    }
}
