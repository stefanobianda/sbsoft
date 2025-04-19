@props(['experience', 'title', 'empty'])

@if($experience->achievements->isNotEmpty())
<x-text-title text="Description of the activities at {{ $experience->name }}:" />
<div>
        @foreach ($experience->achievements as $achievement)
        <h2 class="text-3xl font-extrabold text-center bg-gray-200 p-4 rounded-lg">{{ $achievement->name }}</h2>
        <div class="prose max-w-3xl mx-auto text-justify mb-8 p-4">
            {!! $achievement->description !!}
        </div>
        @auth
        <x-button-link url="{{route('achievements.edit', [$experience->id, $achievement->id])}}">Edit Achievement</x-button-link>
        <x-delete-button action="{{route('achievements.destroy', [$experience->id, $achievement->id])}}" text="Delete Achievement" />
        @endauth
        @endforeach
</div>
@else
<x-text-info text="I haven't held any achievement at {{ $experience->name }}." />   
@endif

