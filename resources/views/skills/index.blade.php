<x-layout>
    <div>
        <h1>Skills</h1>
    </div>
    @forelse($skillCategories as $category)
        <h1>{{$category->name}}</h1>
        <p>{{$category->description}}</p>
        @forelse($category->Skills as $skill)
            <h1>- {{$skill->name}}</h1>
            <p>- {{$skill->description}}</p>
        @empty
            <li>- No skill available</li>
        @endforelse
    @empty
        <li>No category available</li>
    @endforelse

</x-layout>
