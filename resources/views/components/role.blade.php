@props(['role', 'list' => 'none', 'id' => null])

@auth
    @switch($list)
        @case('show')
            <a href="{{route('roles.show', $role->id)}}">
                <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                    <img src="{{ $role->image ? asset('storage/' . $role->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                    <h1 class="text-xl font-bold text-center">{{$role->name}}</h1>
                    <p class="text-center">{{$role->description}}</p>
                </div>
            </a>
            @break
        @case('edit')
            <a href="{{route('roles.edit', $role->id)}}">
                <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                    <img src="{{ $role->image ? asset('storage/' . $role->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                    <h1 class="text-xl font-bold text-center">{{$role->name}}</h1>
                    <p class="text-center">{{$role->description}}</p>
                </div>
            </a>
            @break
        @default
            <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
                <img src="{{ $role->image ? asset('storage/' . $role->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
                <h1 class="text-xl font-bold text-center">{{$role->name}}</h1>
                <p class="text-center">{{$role->description}}</p>
            </div>               
    @endswitch
@else
<a href="{{route('roles.show', $role->id)}}">
    <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
        <img src="{{ $role->image ? asset('storage/' . $role->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
        <h1 class="text-xl font-bold text-center">{{$role->name}}</h1>
        <p class="text-center">{{$role->description}}</p>
    </div>
</a>
@endauth
