<x-layout>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($projects as $project)
            <x-project :project="$project" />
        @empty
            <li>No skill available</li>
        @endforelse
    </div>

    <x-button-link url="{{route('projects.create')}}">Add Project</x-button-link>

</x-layout>