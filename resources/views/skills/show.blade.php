<x-layout>

    <x-skill :skill=$skill list="edit" text="yes" />

    @auth
        <x-button-link url="{{route('skills.edit', $skill->id)}}">Edit Skill</x-button-link>
    
        <x-delete-button action="{{route('skills.destroy', $skill->id)}}" text="Remove Skill" />
    @endauth

    <x-projects-section :projects="$skill->linkedByProjects" 
        title="I have leveraged my expertise in {{ $skill->name }} across multiple projects, applying it effectively in different contexts to drive successful software development." 
        clic="Click on a project to discover the skills I honed throughout the journey and the roles I played." 
        empty="At the moment, I haven't used {{ $skill->name }} in any project." />

    @auth
        <x-button-link url="{{route('skills.projects', $skill->id)}}">Manage Projects</x-button-link>
    @endauth

</x-layout>
