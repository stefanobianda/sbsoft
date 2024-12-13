<x-layout>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        <x-skill :skill="$skill" :list="false" />
    </div>

    <x-button-link url="{{route('skills.edit', $skill->id)}}">Edit Skill</x-button-link>

    <x-delete-button action="{{route('skills.destroy', $skill->id)}}" text="Remove Skill" />


</x-layout>
