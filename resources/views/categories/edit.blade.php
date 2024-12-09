<x-layout>
    <x-slot name="title">Edit Category</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Category</h2>
    <form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Category Info</h2>

        <x-inputs.text id="name" name="name" label="Category name" placeholder="Framework" :value="old('name', $category->name)"/>

        <x-inputs.text id="description" name="description" label="Category Description" placeholder="Description of the framework"  :value="old('description', $category->description)"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
</x-layout>

