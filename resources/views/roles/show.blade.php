<x-layout>

    <x-role :role=$role list="edit" />

    @auth
        <x-button-link url="{{route('roles.edit', $role->id)}}">Edit Role</x-button-link>
    
        <x-delete-button action="{{route('roles.destroy', $role->id)}}" text="Remove Role" />
    @endauth

    @if($role->linkedByProjects->isNotEmpty())
        <x-text-title text="As a {{ $role->name }}, I have worked on the following projects:" />
        <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
            @foreach ($role->linkedByProjects as $project)
                <x-project :project=$project background="bg-gray-300"/>
            @endforeach
        </div>
        <x-text-info text="Click on a project to explore the roles I took on and the skills I developed throughout the journey." />
    @else
        <x-text-info text="So far, I haven't held the role of {{ $role->name }} in any project." />   
    @endif

    @auth
        <x-button-link url="{{route('roles.projects', $role->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
