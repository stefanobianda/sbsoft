<x-layout>

    <x-project :project=$project />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($project->linkedByRoles as $role)
        <div>
            <x-role :role=$role background="bg-gray-300" />
            <x-form-button action="{{route('projects.roles.remove', [ 'project' => $project->id, 'role' => $role->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Role" bgClass="bg-red-500" hoverClass="hover:bg-red-600" />
        </div>
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($roles as $role)
        <div>
            <x-role :role=$role background="bg-gray-300" />
            <x-form-button action="{{route('projects.roles.add', [ 'project' => $project->id, 'role' => $role->id ])}}" text="Link Role" />
        </div>
        @endforeach
    </div>


</x-layout>