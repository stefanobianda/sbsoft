@props(['category'])

@auth
    <a href="{{route('categories.edit', $category->id)}}">
        <div class="bg-gray-300 w-64 h-64 flex-none p-4 m-4 justify-center rounded-lg">
            <h1 class="text-3xl font-bold text-center">{{$category->name}}</h1>
            <p class="my-4">{{$category->description}}</p>
        </div>
    </a>
@else
    <div class="bg-gray-300 w-64 h-64 flex-none p-4 m-4 justify-center rounded-lg">
        <h1 class="text-3xl font-bold text-center">{{$category->name}}</h1>
        <p class="my-4">{{$category->description}}</p>
    </div>
@endauth
