@props(['skill'])

<div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
    <img src="{{ asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
    <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
    <p class="text-center">{{$skill->description}}</p>
</div>
