<x-layout>
    <x-slot name="title">Create Task</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">New Task for experience</h2>
        <form method="POST" action="{{route('tasks.store', $experience)}}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="experience_id" value="{{ $experience->id }}">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Task Info</h2>

            <x-inputs.text id="description" name="description" label="Experience Description" placeholder="Description of the experience"/>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Create</button>
        </form>
    </div>
</x-layout>