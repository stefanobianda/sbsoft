<x-layout>

    <x-experience-detail :experience="$experience" />

    @auth
        <x-button-link url="{{route('experiences.edit', $experience->id)}}">Edit Experience</x-button-link>
        <x-delete-button action="{{route('experiences.destroy', $experience->id)}}" text="Remove Experience" />
    @endauth

    @if($experience->projects->isNotEmpty())
        <x-text-title text="My experience at {{ $experience->name }} was around different projects" />
        <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
            @foreach ($experience->projects as $project)
                <x-project :project=$project background="bg-gray-300"/>
            @endforeach
        </div>
        <x-text-info text="Click on a project to discover the skills I honed throughout the journey and the roles I played." />
    @else
        <x-text-info text="At the moment, I don't have partecipate to any project at {{ $experience->name }}." />
    @endif

    @if($experience->tasks->isNotEmpty())
        <x-text-title text="Description of the activities at {{ $experience->name }}:" />
        <div class="bg-gray-200 p-4 my-4 gap-4 m-4 rounded-lg">
            @auth
                <ul class="list-disc pl-5">
                @foreach ($experience->tasks as $task)
                    <li>{{ $task->description }}</li>
                    <x-button-link url="{{route('tasks.edit', [$experience->id, $task->id])}}">Edit Task</x-button-link>
                    <x-delete-button action="{{route('tasks.destroy', [$experience->id, $task->id])}}" text="Delete Task" />
                @endforeach
                </ul>
            @else
                <ul class="list-disc pl-5">
                @foreach ($experience->tasks as $task)
                    <li>{{ $task->description }}</li>
                @endforeach
                </ul>
            @endauth
        </div>
    @else
        <x-text-info text="I haven't held any task at {{ $experience->name }}." />   
    @endif

    @auth
        <x-button-link url="{{route('tasks.create', $experience->id)}}">Add Task</x-button-link>
    @endauth

    @if($experience->achievements->isNotEmpty())
        <x-text-title text="Description of the activities at {{ $experience->name }}:" />
        <div class="bg-gray-200 p-4 my-4 gap-4 m-4 rounded-lg">
            @auth
                @foreach ($experience->achievements as $achievement)
                <h2 class="text-3xl font-extrabold">{{ $achievement->name }}</h2>
                <div class="prose">
                    {!! $achievement->description !!}
                </div>
                <x-button-link url="{{route('achievements.edit', [$experience->id, $achievement->id])}}">Edit Achievement</x-button-link>
                <x-delete-button action="{{route('achievements.destroy', [$experience->id, $achievement->id])}}" text="Delete Achievement" />
                @endforeach
            @else
                @foreach ($experience->achievements as $achievement)
                <h2 class="text-3xl font-extrabold">{{ $achievement->name }}</h2>
                <div class="prose">
                {!! $achievement->description !!}
                </div>
                @endforeach
            @endauth
        </div>
    @else
        <x-text-info text="I haven't held any achievement at {{ $experience->name }}." />   
    @endif

    @auth
        <x-button-link url="{{route('achievements.create', $experience->id)}}">Add Achievement</x-button-link>
    @endauth

</x-layout>