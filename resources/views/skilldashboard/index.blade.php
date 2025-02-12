<x-layout>

    @forelse($skillCategories as $category)
        <x-category-skill :category="$category" :skills="$category->Skills" />
    @empty
        <li>No category available</li>
    @endforelse

</x-layout>
