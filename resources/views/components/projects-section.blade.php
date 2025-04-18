@props(['projects', 'title', 'clic', 'empty'])

@if($projects->isNotEmpty())
<x-text-title text="{!! $title !!}" />
<div class="bg-gray-200 p-4 my-4 flex grid grid-cols-1 md:grid-cols-4 gap-4 m-4 rounded-lg">
    @foreach ($projects as $project)
        <x-project :project=$project background="bg-gray-300"/>
    @endforeach
</div>
<x-text-info text="{!! $clic !!}" />
@else
<x-text-info text="{!! $empty !!}" />
@endif
