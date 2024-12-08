@props(['category', 'skills' => null])

<div class="bg-gray-200 p-4 my-4 flex justify-left rounded-lg">
    @auth
        <a href="/">
            <x-category :category="$category" />
        </a>
    @else
        <x-category :category="$category" />
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 m-4">
    @forelse($skills as $skill)
        @auth
            <a href="/">
                <x-skill :skill="$skill" />
            </a>
        @else
            <x-skill :skill="$skill" />
        @endauth
    @empty
        <li>No skill available</li>
    @endforelse
    </div>
</div>