<x-layout>

    <x-image-background />

    <x-experience-detail :experience="$experience" />

    @auth
        <x-button-link url="{{route('experiences.edit', $experience->id)}}">Edit Experience</x-button-link>
        <x-delete-button action="{{route('experiences.destroy', $experience->id)}}" text="Remove Experience" />
    @endauth

    <x-experience-tasks-section :experience="$experience" 
        title="Main activities carried out in the position of {{ $experience->name }}" 
        empty="I haven't held any task at {{ $experience->name }}." />

    @auth
        <x-button-link url="{{route('tasks.create', $experience->id)}}">Add Task</x-button-link>
    @endauth

    <x-projects-section :projects="$experience->projects" 
        title="My experience at {{ $experience->name }} was around different projects" 
        clic="Click on a project to discover the skills I honed throughout the journey and the roles I played." 
        empty="At the moment, I don't have partecipate to any project at {{ $experience->name }}." />

    <x-experience-achievements-section :experience="$experience" 
        title="Description of the activities at {{ $experience->name }}:" 
        empty="I haven't held any achievement at {{ $experience->name }}." />

    @auth
        <x-button-link url="{{route('achievements.create', $experience->id)}}">Add Achievement</x-button-link>
    @endauth

</x-layout>