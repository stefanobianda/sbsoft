<x-layout>

    <x-achievement-detail :achievement="$achievement" />

    @auth
        <x-button-link url="{{route('achievements.edit', $achievement->id)}}">Edit Achievement</x-button-link>
        <x-delete-button action="{{route('achievements.destroy', $achievement->id)}}" text="Remove Achievement" />
    @endauth

</x-layout>