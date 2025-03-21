<x-layout>

    <x-skill :skill=$skill />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($skill->linkedByProjects as $project)
        <div>
            <x-project :project=$project />
            <x-form-button action="{{route('skills.projects.remove', [ 'project' => $project->id, 'skill' => $skill->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Project" bgClass="bg-red-500" hoverClass="hover:bg-red-600" />
        </div>
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($projects as $project)
        <div>
            <x-project :project=$project />
            <x-form-button action="{{route('skills.projects.add', [ 'project' => $project->id, 'skill' => $skill->id ])}}" text="Link Project" />
        </div>
        @endforeach
    </div>


</x-layout>