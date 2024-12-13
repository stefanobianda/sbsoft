@props(['category', 'list' => false])

@auth
    @if ($list)
        <div class="flex items-left gap-4 m-4">
            <div>
            <a href="{{route('categories.edit', $category->id)}}">
                <div class="bg-gray-300 w-64 h-32 justify-left rounded-lg">
                    <h1 class="text-3xl font-bold text-center">{{$category->name}}</h1>
                    <p class="my-4">{{$category->description}}</p>
                </div>
            </a>

            <x-delete-button action="{{route('categories.destroy', $category->id)}}" text="Remove Category" />

            </div>
        </div>    
    @else
        <a href="{{route('categories.edit', $category->id)}}">
            <div class="bg-gray-300 w-64 h-64 flex-none p-4 m-4 justify-center rounded-lg">
                <h1 class="text-3xl font-bold text-center">{{$category->name}}</h1>
                <p class="my-4">{{$category->description}}</p>
            </div>
        </a>
    @endif
@else
    <div class="bg-gray-300 w-64 h-64 flex-none p-4 m-4 justify-center rounded-lg">
        <h1 class="text-3xl font-bold text-center">{{$category->name}}</h1>
        <p class="my-4">{{$category->description}}</p>
    </div>
@endauth
