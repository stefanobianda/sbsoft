@props(['experience'])

<div class="items-left rounded-lg flex flex-col justify-left text-left  p-4 my-4 gap-4 m-4 ">
    <a href="{{route('experiences.show', $experience->id)}}">
        <h1 class="text-3xl font-bold mb-4">{{$experience->name}}</h1>
        <p>{{$experience->description}}</p>
        <div class="flex justify-center mb-4">
        <img src="{{ $experience->image ? asset('storage/' . $experience->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        </div>
        <p>{{$experience->company}}</p>
    </a>
</div>


