<x-layout>

    <x-text-title text="Welcome to my Project Portfolio – Explore my Software Development Journey." />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($projects as $project)
            <x-project :project="$project" background="bg-gray-300"/>
        @empty
            <li>No skill available</li>
        @endforelse
    </div>
    <x-text-info text="Click on a project to view more details." />

    @auth
        <x-button-link url="{{route('projects.create')}}">Add Project</x-button-link>
    @endauth

</x-layout>