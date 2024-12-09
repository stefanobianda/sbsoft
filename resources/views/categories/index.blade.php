<x-layout>
    <div>
        <h1>Show Category</h1>
        @forelse($categories as $category)
            <x-category :category="$category" />
        @empty
            <li>No skill available</li>
        @endforelse
    </div>
</x-layout>
