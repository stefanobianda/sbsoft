<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    // CRUD section
    // @desc Show create task form for experience
    // @route GET /experiences/{experience}/tasks/create
    public function create(Experience $experience): View
    {
        return view("tasks.create")->with("experience", $experience);
    }

    // @desc Show edit task form for experience
    // @route GET /experiences/{experience}/tasks/{$id}/edit
    public function edit(Experience $experience, Task $task): View
    {
        return view("tasks.edit")->with("task", $task)->with("experience", $experience);
    }

    // @desc Save the new task for experience
    // @route POST /experiences/{experience}/tasks
    public function store(Request $request, Experience $experience): RedirectResponse
    {
        $validatedData = $request->validate([
            "description"=> "string|max:255",
            "experience_id" => "required|integer|exists:experiences,id",
        ]);

        $task = Task::create($validatedData);

        return redirect()->route("experiences.show", $experience)->with("success","Task created successfully!");
    }


    // @desc Update the existing task for experience
    // @route PUT /experiences/{experience}/tasks/{$id}
    public function update(Request $request, Experience $experience, Task $task): RedirectResponse
    {
        $validatedData = $request->validate([
            "description"=> "string|max:255",
            "experience_id" => "required|integer|exists:experiences,id",
        ]);

        $task->update($validatedData);

        return redirect()->route("experiences.show", $experience)->with("success","Task updated successfully!");
    }

    // @desc delete a task of experience
    // @route DELETE /experiences/{experience}/tasks/{$id}    
    public function destroy(Experience $experience, Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route("experiences.show", $experience)->with("success","Task deleted successfully!");
    }
}
