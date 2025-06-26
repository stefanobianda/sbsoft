@php
    $random = rand(1, 6);
@endphp


<div class="relative w-full h-48 overflow-hidden">
  <img src="{{ asset('images/background/background_' . $random . '.webp') }}"
       class="absolute w-full h-full object-cover animate-zoom-pan" />
</div>
