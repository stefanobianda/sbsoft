<x-layout>
    <x-slot name="title">Create Role</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">New Role</h2>
    <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data" >
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Role Info</h2>

        <x-inputs.text id="name" name="name" label="Role name" placeholder="Role"/>

        <x-inputs.text id="description" name="description" label="Role Description" placeholder="Description of the role"/>

        <x-inputs.file id="image" name="image" label="Role image" />

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Create</button>
    </form>
</div>
</x-layout>