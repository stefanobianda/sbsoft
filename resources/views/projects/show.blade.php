<x-layout>

    <x-project :project="$project" />

    <x-button-link url="{{route('projects.edit', 1 )}}">Edit Project</x-button-link>

    <x-delete-button action="{{route('projects.destroy', $project->id)}}" text="Remove Project" />


</x-layout>