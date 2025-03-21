<x-layout>

    <x-text-title text="Discover My Expertise – A Breakdown of Tools, Frameworks, Languages and More." />
    @forelse($skillCategories as $category)
        <x-category-skill :category="$category" :skills="$category->Skills" />
    @empty
        <li>No category available</li>
    @endforelse

</x-layout>
