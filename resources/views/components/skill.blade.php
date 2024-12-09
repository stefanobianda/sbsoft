@props(['skill', 'list' => false])

@auth
    @if ($list)
        <a href="{{route('skills.edit', $skill->id)}}">
            <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                <img src="{{ asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                <p class="text-center">{{$skill->description}}</p>
                <form method="POST" action="{{route('skills.destroy', $skill->id)}}" class="mt-10">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-trash mr-3"></i> Remove Skill
                    </button>
                </form>
            </div>
        </a>
    @else
        <a href="{{route('skills.edit', $skill->id)}}">
            <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                <img src="{{ asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
                <p class="text-center">{{$skill->description}}</p>
            </div>
        </a>
    @endif
@else
    <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
        <img src="{{ asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
        <p class="text-center">{{$skill->description}}</p>
    </div>
@endauth
