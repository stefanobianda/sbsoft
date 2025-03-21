@props(['category', 'skills' => null])

<div class="p-4 my-4 flex justify-left rounded-lg">
    <x-category :category="$category" />
    <div>
        <div class="bg-gray-200 grid grid-cols-1 md:grid-cols-4 gap-4 m-4">
            @forelse($skills as $skill)
                <x-skill :skill="$skill" list="show" background="bg-gray-300"/>
            @empty
                <li>No skill available</li>
            @endforelse
        </div>
        @if($skills->isNotEmpty())
            <div>
                <x-text-info text="Click on a skill from {{ $category->name }} to see which projects I have used it in." />
            </div>
        @endif
    </div>
</div>
