<x-layout>
    <div>
        <h1>Skills</h1>
    </div>
    @forelse($skills as $skill)
    <h1>{{$skill->name}}</h1>
    <p>{{$skill->description}}</p>
    @empty
    <li>No skill available</li>
    @endforelse

</x-layout>
