<x-layout>

    <x-project :project=$project />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($project->linkedBySkills as $skill)
            <x-skill :skill=$skill />
            <x-form-button action="{{route('projects.skills.remove', [ 'project' => $project->id, 'skill' => $skill->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Skill" />
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($skills as $skill)
            <x-skill :skill=$skill />
            <x-form-button action="{{route('projects.skills.add', [ 'project' => $project->id, 'skill' => $skill->id ])}}" text="Link Skill" />
        @endforeach
    </div>


</x-layout>