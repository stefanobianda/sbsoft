@props(['role', 'list' => 'none', 'id' => null])

<a href="{{route('roles.show', $role->id)}}">
    <div class="bg-gray-300 text-blue-800 items-center rounded-lg flex flex-col justify-center text-center">
        <h1 class="text-xl font-bold text-center">{{$role->name}}</h1>
    </div>
</a>

