@props(['project'])

<div class="items-left rounded-lg flex flex-col justify-left text-left  p-4 my-4 gap-4 m-4 ">
    <a href="{{route('projects.show', $project->id)}}">
        <h1 class="text-3xl font-bold mb-4">{{$project->name}}</h1>
        <p>{{$project->shortDescription}}</p>
        <div class="flex justify-center mb-4">
        <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        </div>
        <p>{{$project->company}}</p>
    </a>
</div>


