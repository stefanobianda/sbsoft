@php
    $random = rand(1, 6);
@endphp

<div class="w-full h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/background/background_' . $random . '.webp') }}');">
</div>
