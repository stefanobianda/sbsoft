<x-layout>
    <x-slot name="title">Edit Task</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Task</h2>
    <form method="POST" action="{{route('tasks.update', [$experience->id, $task->id])}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" name="experience_id" value="{{ $experience->id }}">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Task Info</h2>

        <x-inputs.text id="description" name="description" label="Task Description" placeholder="Description of the task" :value="old('description', $task->description)"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>
