@props(['action', 'text' => 'Remove ...'])

<form method="POST" action={{$action}} class="mt-10">
    @csrf
    @method('DELETE')
    <button class="bg-red-500 hover:bg-red-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
        <i class="fas fa-trash mr-3"></i> {{$text}}
    </button>
</form>
