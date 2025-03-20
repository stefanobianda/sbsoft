<x-layout>

    <x-skill :skill=$skill list="edit" />

    @auth
        <x-button-link url="{{route('skills.edit', $skill->id)}}">Edit Skill</x-button-link>
    
        <x-delete-button action="{{route('skills.destroy', $skill->id)}}" text="Remove Skill" />
    @endauth

    @if($skill->linkedByProjects->isNotEmpty())
        <x-text-title text="I have leveraged my expertise in {{ $skill->name }} across multiple projects, applying it effectively in different contexts to drive successful software development." />
        <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
            @foreach ($skill->linkedByProjects as $project)
                <x-project :project=$project />
            @endforeach
        </div>
        <x-text-info text="Click on a project to discover the skills I honed throughout the journey and the roles I played." />
    @else
        <x-text-info text="At the moment, I haven't used {{ $skill->name }} in any project." />
    @endif

    @auth
        <x-button-link url="{{route('skills.projects', $skill->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
