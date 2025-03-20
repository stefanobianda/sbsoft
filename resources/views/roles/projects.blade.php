<x-layout>

    <x-role :role=$role />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($role->linkedByProjects as $project)
        <div>
            <x-project :project=$project />
            <x-form-button action="{{route('roles.projects.remove', [ 'project' => $project->id, 'role' => $role->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Project" />
        </div>
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($projects as $project)
        <div>
            <x-project :project=$project />
            <x-form-button action="{{route('roles.projects.add', [ 'project' => $project->id, 'role' => $role->id ])}}" text="Link Project" />
        </div>
        @endforeach
    </div>


</x-layout>