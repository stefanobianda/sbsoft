<x-layout>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($categories as $category)
            <x-category :category="$category" :list="true" />
        @empty
            <li>No skill available</li>
        @endforelse
    </div>

    <x-button-link url="{{route('categories.create')}}">Add Category</x-button-link>

</x-layout>
