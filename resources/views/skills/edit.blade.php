<x-layout>
    <x-slot name="title">Edit Skill</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Skill</h2>
    <form method="POST" action="{{route('skills.update', $skill->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Skill Info</h2>

        <div class="flex justify-center items-center mb-6 h-48">
            <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-48 m-1">
        </div>

        <x-inputs.text id="name" name="name" label="Skill name" placeholder="Framework" :value="old('name', $skill->name)"/>

        <x-inputs.text id="description" name="description" label="Skill Description" placeholder="Description of the framework"  :value="old('description', $skill->description)"/>
   
        <x-inputs.select id="category_id" name="category_id" label="Category" value="{{$skill->category_id}}" :options="$categories" />
    
        <x-inputs.file id="image" name="image" label="Skill image" />

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>

