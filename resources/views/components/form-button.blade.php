@props(['action', 'delete' => false, 'bgClass' => 'bg-yellow-500', 'hoverClass' => 'hover:bg-yellow-600', 'icon' => 'fa-link', 'text' => 'Remove ...'])

<form method="POST" action={{$action}} class="mt-10">
    @csrf
    @if ($delete)
        @method('DELETE')
    @endif
    <button class="{{$bgClass}} {{$hoverClass}} text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
        <i class="fas {{$icon}} mr-3"></i> {{$text}}
    </button>
</form>
 