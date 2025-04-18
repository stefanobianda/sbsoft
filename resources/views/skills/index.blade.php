<x-layout>

    <x-image-background />

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($skills as $skill)
            <x-skill :skill="$skill" list="show" background="bg-gray-300"/>
        @empty
            <li>No skill available</li>
        @endforelse
    </div>

    @auth
        <x-button-link url="{{route('skills.create')}}">Add Skill</x-button-link>
    @endauth

</x-layout>
