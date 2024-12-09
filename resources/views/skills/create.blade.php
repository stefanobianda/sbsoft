<x-layout>
    <x-slot name="title">Create Skill</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">New Skill</h2>
    <form method="POST" action="{{route('skills.store')}}" enctype="multipart/form-data" >
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Skill Info</h2>

        <x-inputs.text id="name" name="name" label="Skill name" placeholder="Skill"/>

        <x-inputs.text id="description" name="description" label="Skill Description" placeholder="Description of the skill"/>

        <x-inputs.select id="category_id" name="category_id" label="Category" value="{{old('category_id')}}" :options="$categories" />

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Create</button>
    </form>
</div>
</x-layout>

