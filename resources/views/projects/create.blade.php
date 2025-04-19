<x-layout>
    <x-slot name="title">Create Project</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">New Project</h2>
        <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data" >
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Project Info</h2>

            <x-inputs.text id="name" name="name" label="Project name" placeholder="Project name"/>

            <x-inputs.text id="shortDescription" name="shortDescription" label="Project Short Description" placeholder="Description of the project"/>

            <x-inputs.text id="role" name="role" label="Project Role" placeholder="Role"/>

            <x-inputs.text id="description" name="description" label="Project Description" placeholder="Description of the project"/>

            <x-inputs.text id="company" name="company" label="Company" placeholder="Name of the company"/>

            <x-inputs.select id="experience_id" name="experience_id" label="Experience" value="{{old('experience_id')}}" :options="$experiences" />

            <x-inputs.file id="image" name="image" label="Project image" />

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Create</button>
        </form>
    </div>
</x-layout>