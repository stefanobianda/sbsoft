@props(['category', 'skills' => null])

<div class="p-4 my-4 flex justify-left rounded-lg">
    <x-category :category="$category" />
    <div>
        <x-skills-section :skills="$skills" 
            title="Skills on {{ $category->name }}" 
            clic="Click on a skill from {{ $category->name }} to see which projects I have used it in." 
            empty="No skill available" />
    </div>
</div>
