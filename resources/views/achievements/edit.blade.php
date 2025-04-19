<x-layout>
    <x-slot name="title">Edit Achievement</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Achievement</h2>
    <form method="POST" action="{{route('achievements.update', [$experience->id, $achievement->id])}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" name="experience_id" value="{{ $experience->id }}">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Achievement Info</h2>

        <x-inputs.text id="name" name="name" label="Achievement name" placeholder="Achievement name" :value="old('name', $achievement->name)"/>

        <x-inputs.textarea id="description" name="description" label="Achievement Description" placeholder="Description of the achievement" :value="old('description', $achievement->description)"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>
