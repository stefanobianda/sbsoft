@props(['skill', 'list' => false])

@auth
    @if ($list)
        <a href="{{route('skills.show', $skill->id)}}">
            <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                <p class="text-center">{{$skill->description}}</p>
            </div>
        </a>
    @else
        <a href="{{route('skills.edit', $skill->id)}}">
            <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                <p class="text-center">{{$skill->description}}</p>
            </div>
        </a>
    @endif
@else
    <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
        <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
        <p class="text-center">{{$skill->description}}</p>
    </div>
@endauth
