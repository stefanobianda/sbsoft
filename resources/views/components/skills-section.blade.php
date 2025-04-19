@props(['skills', 'title', 'clic', 'empty'])

@if($skills->isNotEmpty())
<x-text-title text="{!! $title !!}" />
<div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
    @foreach ($skills as $skill)
        <x-skill :skill=$skill list="show" background="bg-gray-300"/>
    @endforeach
</div>
<x-text-info text="{!! $clic !!}" />
@else
<x-text-info text="{!! $empty !!}" />
@endif
