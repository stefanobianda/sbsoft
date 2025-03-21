<x-layout>

    <x-text-title text="Explore the Roles I've taken in my Projects – A Snapshot of my Professional Journey." />
    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($roles as $role)
            <x-role :role="$role" list="show" background="bg-gray-300"/>
        @empty
            <li>No role available</li>
        @endforelse
    </div>
    <x-text-info text="Click on a role to view more details." />

    @auth
        <x-button-link url="{{route('roles.create')}}">Add Role</x-button-link>
    @endauth

</x-layout>
