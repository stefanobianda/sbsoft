@props(['experience', 'title', 'empty'])

@if($experience->tasks->isNotEmpty())
<x-text-title text="{!! $title !!}" />
<div class="rounded-lg">
    @auth
        <ul class="list-disc pl-5">
        @foreach ($experience->tasks as $task)
            <li>{{ $task->description }}</li>
            <x-button-link url="{{route('tasks.edit', [$experience->id, $task->id])}}">Edit Task</x-button-link>
            <x-delete-button action="{{route('tasks.destroy', [$experience->id, $task->id])}}" text="Delete Task" />
        @endforeach
        </ul>
    @else
    <div class="list-disc text-center">
        @foreach ($experience->tasks as $task)
            <p class="p-2 {{ $loop->even ? 'bg-gray-200' : '' }}">
                {{ $task->description }}
            </p>
        @endforeach
    </div>
    @endauth
</div>
@else
<x-text-info text="{!! $empty !!}" />   
@endif
