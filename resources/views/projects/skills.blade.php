<x-layout>

    <x-project :project=$project />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($project->linkedBySkills as $skill)
        <div>
            <x-skill :skill=$skill background="bg-gray-300" />
            <x-form-button action="{{route('projects.skills.remove', [ 'project' => $project->id, 'skill' => $skill->id ])}}" :delete='true' icon='fa-unlink' text="Unlink Skill" bgClass="bg-red-500" hoverClass="hover:bg-red-600" />
        </div>
        @endforeach
    </div>
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($skills as $skill)
        <div>
            <x-skill :skill=$skill background="bg-gray-300" />
            <x-form-button action="{{route('projects.skills.add', [ 'project' => $project->id, 'skill' => $skill->id ])}}" text="Link Skill" />
        </div>
        @endforeach
    </div>


</x-layout>