<x-layout>

    <x-image-background />

    <x-role :role=$role list="edit" />

    @auth
        <x-button-link url="{{route('roles.edit', $role->id)}}">Edit Role</x-button-link>
    
        <x-delete-button action="{{route('roles.destroy', $role->id)}}" text="Remove Role" />
    @endauth

    <x-projects-section :projects="$role->linkedByProjects" 
        title="While serving as {{ $role->name }}, I contributed to the following projects" 
        clic="Discover the roles I embraced and the skills I sharpened by clicking on each project." 
        empty="So far, I haven't held the role of {{ $role->name }} in any project" />

    @auth
        <x-button-link url="{{route('roles.projects', $role->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
