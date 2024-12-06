<header class="bg-blue-600 text-black p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-semibold">
                <a href="{{url('/')}}">SBSoft</a>
            </h1>
            <h3>By Stefano Bianda</h3>
        </div>
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url='/projects' :active="request()->is('projects')">Projects</x-nav-link>
            <x-nav-link url='/experiences' :active="request()->is('experiences')">Experiences</x-nav-link>
            @auth
            <x-logout-button />
            @else
            <x-nav-link url='/login' :active="request()->is('login')" icon="user">Login</x-nav-link>
            @endauth
        </nav>
        <button id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <nav
        id="mobile-menu"
        class="hidden md:hidden bg-blue-600 text-white mt-5 pb-4 space-y-2">
        <x-nav-link url='/projects' :active="request()->is('projects')" :mobile="true">Projects</x-nav-link>
        <x-nav-link url='/experiences' :active="request()->is('experiences')" :mobile="true">Experiences</x-nav-link>
        @auth
        <x-logout-button />
        @else
        <x-nav-link url='/login' :active="request()->is('login')" icon="user">Login</x-nav-link>
        @endauth
    </nav>
</header>