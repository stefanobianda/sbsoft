<x-layout>

    <div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
        @forelse($roles as $role)
            <x-role :role="$role" list="show" />
        @empty
            <li>No role available</li>
        @endforelse
    </div>

    <x-button-link url="{{route('roles.create')}}">Add Role</x-button-link>

</x-layout>
