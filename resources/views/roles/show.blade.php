<x-layout>

    <x-role :role=$role list="edit" />

    @auth
        <x-button-link url="{{route('roles.edit', $role->id)}}">Edit Role</x-button-link>
    
        <x-delete-button action="{{route('roles.destroy', $role->id)}}" text="Remove Role" />
    @endauth

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($role->linkedByProjects as $project)
            <x-project :project=$project />
        @endforeach
    </div>

    @auth
        <x-button-link url="{{route('roles.projects', $role->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
