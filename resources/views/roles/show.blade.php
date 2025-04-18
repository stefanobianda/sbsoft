<x-layout>

    <x-role :role=$role list="edit" />

    @auth
        <x-button-link url="{{route('roles.edit', $role->id)}}">Edit Role</x-button-link>
    
        <x-delete-button action="{{route('roles.destroy', $role->id)}}" text="Remove Role" />
    @endauth

    <x-projects-section :projects="$role->linkedByProjects" 
        title="As a {{ $role->name }}, I have worked on the following projects:" 
        clic="Click on a project to explore the roles I took on and the skills I developed throughout the journey." 
        empty="So far, I haven't held the role of {{ $role->name }} in any project" />

    @auth
        <x-button-link url="{{route('roles.projects', $role->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
