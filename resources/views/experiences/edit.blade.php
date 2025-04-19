<x-layout>
    <x-slot name="title">Edit Experience</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Experience</h2>
    <form method="POST" action="{{route('experiences.update', $experience->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Experience Info</h2>

        <div class="flex justify-center items-center mb-6 h-48">
            <img src="{{ $experience->image ? asset('storage/' . $experience->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-48 m-1">
        </div>

        <x-inputs.text id="name" name="name" label="Experience name" placeholder="Experience name" :value="old('name', $experience->name)"/>

        <x-inputs.textarea id="description" name="description" label="Experience Description" placeholder="Description of the experience" :value="old('description', $experience->description)"/>

        <x-inputs.text id="company" name="company" label="Company" placeholder="Name of the company" :value="old('company', $experience->company)"/>

        <x-inputs.file id="image" name="image" label="Experience image" :value="old('image', $experience->image)"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>
