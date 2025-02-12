@props(['skill', 'list' => false])

<div class="bg-gray-300 items-center rounded-lg flex flex-col justify-center text-center">
    <img src="{{ $skill->image ? asset('storage/' . $skill->image) : asset('images/no-image-available.png') }}" alt="no image available" class="h-20 m-1">
    <h1 class="text-xl font-bold text-center">{{$skill->name}}</h1>
    <p class="text-center">{{$skill->description}}</p>
</div>

<div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
    @foreach ($skill->linkedByProjects as $project)
        <x-project :project=$project />
    @endforeach
</div>
