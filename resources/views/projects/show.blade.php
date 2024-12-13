<x-layout>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
            <h1>{{$project->name}}</h1>
    </div>

    <x-button-link url="{{route('projects.edit', 1 )}}">Edit Project</x-button-link>

    <form method="POST" action="{{route('projects.destroy', $project->id)}}" class="mt-10">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
            <i class="fas fa-trash mr-3"></i> Remove Project
        </button>
    </form>

</x-layout>