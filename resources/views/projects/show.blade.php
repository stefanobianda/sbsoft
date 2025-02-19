<x-layout>

    <x-project-detail :project="$project" />

    @auth
        <x-button-link url="{{route('projects.edit', $project->id)}}">Edit Project</x-button-link>
        <x-delete-button action="{{route('projects.destroy', $project->id)}}" text="Remove Project" />
    @endauth

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($project->linkedBySkills as $skill)
            <x-skill :skill=$skill list="show" />
        @endforeach
    </div>

    @auth
        <x-button-link url="{{route('projects.skills', $project->id)}}">Manage Skills</x-button-link>
    @endauth

</x-layout>