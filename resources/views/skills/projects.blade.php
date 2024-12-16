<x-layout>

    <x-skill :skill=$skill />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($skill->linkedByProjects as $project)
            <x-project :project=$project />
            <x-form-button action="{{route('skills.projects.remove', [ 'project' => $project->id, 'skill' => $skill->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Project" />
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($projects as $project)
            <x-project :project=$project />
            <x-form-button action="{{route('skills.projects.add', [ 'project' => $project->id, 'skill' => $skill->id ])}}" text="Link Project" />
        @endforeach
    </div>


</x-layout>