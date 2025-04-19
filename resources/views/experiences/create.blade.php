<x-layout>
    <x-slot name="title">Create Experience</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">New Experience</h2>
        <form method="POST" action="{{route('experiences.store')}}" enctype="multipart/form-data" >
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Experience Info</h2>

            <x-inputs.text id="name" name="name" label="Experience name" placeholder="Experience name"/>

            <x-inputs.textarea id="description" name="description" label="Experience Description" placeholder="Description of the experience"/>

            <x-inputs.text id="company" name="company" label="Company" placeholder="Name of the company"/>

            <x-inputs.file id="image" name="image" label="Experience image" />

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Create</button>
        </form>
    </div>
</x-layout>