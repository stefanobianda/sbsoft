<x-layout>

    <x-experience-detail :experience="$experience" />

    @auth
        <x-button-link url="{{route('experiences.edit', $experience->id)}}">Edit Experience</x-button-link>
        <x-delete-button action="{{route('experiences.destroy', $experience->id)}}" text="Remove Experience" />
    @endauth

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
                <p>{{ $achievement->description }}</p>
                <x-button-link url="{{route('achievements.edit', [$experience->id, $achievement->id])}}">Edit Achievement</x-button-link>
                    <x-delete-button action="{{route('achievements.destroy', [$experience->id, $achievement->id])}}" text="Delete Achievement" />
                @endforeach
            @else
                @foreach ($experience->achievements as $achievement)
                <h2 class="text-3xl font-extrabold">{{ $achievement->name }}</h2>
                <p>{{ $achievement->description }}</p>
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