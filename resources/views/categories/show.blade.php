<x-layout>
    <x-slot name="title">Show Category</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">Show Category</h2>
    @csrf
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Category Info</h2>

    <h2>Category name:</h2>
    <p>{{$category->name}}</p>

    <h2>Category Description:</h2>
    <p>{{$category->description}}</p>

    <a href="{{route('categories.edit',$category->id)}}">Edit {{$category->id}}</a>
    <a href="{{route('categories.destroy',$category->id)}}">Delete {{$category->id}}</a>

    <form method="POST" action="{{route('categories.destroy', $category->id)}}" class="mt-10">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
            <i class="fas fa-bookmark mr-3"></i> Remove Category
        </button>
    </form>

</div>
</x-layout>

