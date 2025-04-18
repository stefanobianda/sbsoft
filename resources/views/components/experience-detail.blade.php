@props(['experience'])

<x-image-background />

<h1 class="text-3xl text-center font-bold m-10">{{$experience->name}}</h1>
<a href="{{route('experiences.show', $experience->id)}}">
    <div class="relative items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 overflow-hidden min-h-[200px]">

        {{-- BACKGROUND IMAGE --}}
        <div class="absolute inset-0 z-0 bg-cover bg-center"
             style="background-image: url('{{ $experience->image ? asset('storage/' . $experience->image) : asset('images/no-image-available.png') }}');">
        </div>

        {{-- MAIN CONTENT --}}
        <div class="z-10 flex flex-col items-center justify-center text-center gap-4">
            <p>{{$experience->description}}</p>
            <p>{{$experience->company}}</p>
        </div>

    </div>
</a>

