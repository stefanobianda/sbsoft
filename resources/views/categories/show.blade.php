<x-layout>
    <x-slot name="title">Show Category</x-slot>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        <x-category :category="$category" :list="false" />
    </div>

    <x-button-link url="{{route('categories.edit', $category->id)}}">Edit Category</x-button-link>

    <x-form-button action="{{route('categories.destroy', $category->id)}}" :delete="true" text="Remove Category" />

</div>
</x-layout>

