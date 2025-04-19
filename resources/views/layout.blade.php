<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(entrypoints: 'resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{$title ?? 'SBSoft'}}</title>
</head>
<body>
    <x-header />
    <main class="w-full">
        {{-- <x-under-costruction /> --}}
        {{-- Display alert messages --}}
        @if(session('success'))
        <x-alert type="success" message="{{session('success')}}" />
        @endif
        @if(session('error'))
        <x-alert type="error" message="{{session('error')}}" />
        @endif
        {{$slot}}
    </main>
    <x-footer />
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>