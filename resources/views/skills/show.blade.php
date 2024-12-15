<x-layout>

    <div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-left p-4 mb-4">
        <a href="{{route('skills.show', $skill->id)}}">
            <h1 class="text-3xl font-bold mb-4">{{$skill->name}}</h1>
            <div class="flex justify-center mb-4">
            <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
            </div>
            <p>{{$skill->shortDescription}}</p>
        </a>
    </div>

    <x-button-link url="{{route('skills.edit', $skill->id)}}">Edit Skill</x-button-link>

    <x-delete-button action="{{route('skills.destroy', $skill->id)}}" text="Remove Skill" />

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @foreach ($skill->linkedByProjects as $project)
            <x-project :project=$project />
        @endforeach
    </div>

    <x-button-link url="{{route('skills.edit', $skill->id)}}">Manage projects</x-button-link>

</x-layout>
