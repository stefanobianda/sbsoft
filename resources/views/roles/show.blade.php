<x-layout>

    <x-role :role=$role list="edit" />

    @auth
        <x-button-link url="{{route('roles.edit', $role->id)}}">Edit Role</x-button-link>
    
        <x-delete-button action="{{route('roles.destroy', $role->id)}}" text="Remove Role" />
    @endauth


</x-layout>
