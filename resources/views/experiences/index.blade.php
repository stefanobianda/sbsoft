<x-layout>

    <x-text-title text="Welcome to my Experience Portfolio – Explore my Software Development Journey." />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($experiences as $experience)
            <x-experience :experience="$experience" background="bg-gray-300"/>
        @empty
            <li>No experience available</li>
        @endforelse
    </div>
    <x-text-info text="Click on a experience to view more details." />

    @auth
        <x-button-link url="{{route('experiences.create')}}">Add Experience</x-button-link>
    @endauth

</x-layout>