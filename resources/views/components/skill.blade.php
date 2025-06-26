@props(['skill', 'list' => 'none', 'id' => null, 'background' => null, 'text' => null])

@auth
    @switch($list)
        @case('show')
            <a href="{{route('skills.show', $skill->id)}}">
                <div class="{{ $background }} items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 transform transition-transform duration-200 ease-in-out hover:scale-105 shadow-md hover:shadow-lg">
                    <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                    <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                    @if ($text == 'yes')
                    <p class="text-center">{{$skill->description}}</p>
                    @endif
                </div>
            </a>
            @break
        @case('edit')
            <a href="{{route('skills.edit', $skill->id)}}">
                <div class="{{ $background }} items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 transform transition-transform duration-200 ease-in-out hover:scale-105 shadow-md hover:shadow-lg">
                    <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                    <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                    @if ($text == 'yes')
                    <p class="text-center">{{$skill->description}}</p>
                    @endif
                </div>
            </a>
            @break
        @default
            <div class="{{ $background }} items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 transform transition-transform duration-200 ease-in-out hover:scale-105 shadow-md hover:shadow-lg">
                <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                @if ($text == 'yes')
                <p class="text-center">{{$skill->description}}</p>
                @endif
        </div>               
    @endswitch
@else
<a href="{{route('skills.show', $skill->id)}}">
    <div class="{{ $background }} items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 transform transition-transform duration-200 ease-in-out hover:scale-105 shadow-md hover:shadow-lg">
        <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
        @if ($text == 'yes')
        <p class="text-center">{{$skill->description}}</p>
        @endif
    </div>
</a>
@endauth
