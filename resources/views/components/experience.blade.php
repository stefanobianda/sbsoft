@props(['experience', 'background' => null])

<div class="{{ $background }} items-center text-center rounded-lg flex flex-col justify-center text-left p-4 mb-4">
    <a href="{{route('experiences.show', $experience->id)}}">
        <h1 class="text-3xl font-bold mb-4">{{$experience->name}}</h1>
        <div class="flex justify-center mb-4">
        <img src="{{ $experience->image ? asset('storage/' . $experience->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        </div>
        <p>{{$experience->company}}</p>
    </a>
</div>