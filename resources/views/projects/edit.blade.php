<x-layout>
    <x-slot name="title">Edit Project</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Project</h2>
    <form method="POST" action="{{route('projects.update', $project->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Project Info</h2>

        <div class="flex justify-center items-center mb-6 h-48">
            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-48 m-1">
        </div>

        <x-inputs.text id="name" name="name" label="Project name" placeholder="Project name" :value="old('name', $project->name)"/>

        <x-inputs.text id="shortDescription" name="shortDescription" label="Project Short Description" placeholder="Description of the project" :value="old('shortDescription', $project->shortDescription)"/>

        <x-inputs.text id="role" name="role" label="Project Role" placeholder="Role" :value="old('role', $project->role)"/>

        <x-inputs.text id="description" name="description" label="Project Description" placeholder="Description of the project" :value="old('description', $project->description)"/>

        <x-inputs.text id="company" name="company" label="Company" placeholder="Name of the company" :value="old('company', $project->company)"/>

        <x-inputs.file id="image" name="image" label="Project image" :value="old('image', $project->image)"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>
