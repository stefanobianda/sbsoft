<x-layout>

    <x-project-detail :project="$project" />

    @auth
        <x-button-link url="{{route('projects.edit', $project->id)}}">Edit Project</x-button-link>
        <x-delete-button action="{{route('projects.destroy', $project->id)}}" text="Remove Project" />
    @endauth

    @if($project->linkedByRoles->isNotEmpty())
        <x-text-title text="The following roles defined my contribution to the {{ $project->name }} project:" />
        <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
            @foreach ($project->linkedByRoles as $role)
                <x-role-simple :role=$role list="show" />
            @endforeach
        </div>
        <x-text-info text="Click on a role to see in which other projects I've performed that role." />
    @else
        <x-text-info text="I haven't held any role in the {{ $project->name }} project yet." />   
    @endif

    @auth
        <x-button-link url="{{route('projects.roles', $project->id)}}">Manage Roles</x-button-link>
    @endauth

    @if ($project->linkedBySkills->isNotEmpty())
        <x-text-title text="In the {{ $project->name }} project, I utilized and applied a variety of skills including:" />
            <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
                @foreach ($project->linkedBySkills as $skill)
                    <x-skill :skill=$skill list="show" background="bg-gray-300"/>
                @endforeach
            </div>
        <x-text-info text="Click on a skill to see which other projects I've applied it to." />
    @else
        <x-text-info text="I haven't utilized any skills in the {{ $project->name }} project yet." />
    @endif

    @auth
        <x-button-link url="{{route('projects.skills', $project->id)}}">Manage Skills</x-button-link>
    @endauth

</x-layout>