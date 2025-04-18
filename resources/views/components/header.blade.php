<header class="bg-blue-600 text-black p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/SBSoft_Logo.png') }}" alt="no image available" class="h-20 m-1">
            <div class="mx-5">
                <h1 class="text-3xl font-semibold">
                    <a href="{{url('/')}}">SBSoft</a>
                </h1>
                <h3>By Stefano Bianda</h3>
            </div>
        </div>
        <nav class="hidden md:flex items-center space-x-4">
            <ul class="flex space-x-6">
                <li>
                    <x-nav-link url='/' :active="request()->is('/')">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link url='/experiences' :active="request()->is('experiences')">Experiences</x-nav-link>
                </li>
                <li>
                    <x-nav-link url='/projects' :active="request()->is('projects')">Projects</x-nav-link>
                </li>
                <li>
                    <x-nav-link url='/roles' :active="request()->is('roles')">Roles</x-nav-link>
                </li>
                @auth
                <li class="relative group">
                    <x-nav-link url='/skilldashboard' :active="request()->is('skilldashboard')">Dashboard</x-nav-link>
                    <ul class="absolute hidden group-hover:block bg-blue-600 rounded shadow-lg mt-2">
                        <li>
                            <x-nav-link url='/skills' :active="request()->is('skills')">Skills</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link url='/categories' :active="request()->is('categories')">Categories</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link url='/roles' :active="request()->is('roles')">Roles</x-nav-link>
                        </li>
                    </ul>
                </li>
                @else
                <li>
                    <x-nav-link url='/skilldashboard' :active="request()->is('skilldashboard')">Skills</x-nav-link>
                </li>
                @endauth
            </ul>
        </nav>
        <button id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <nav
        id="mobile-menu"
        class="hidden md:hidden bg-blue-600 text-white mt-5 pb-4 space-y-2">
        <x-nav-link url='/' :active="request()->is('/')" :mobile="true">Home</x-nav-link>
        <x-nav-link url='/experiences' :active="request()->is('experiences')" :mobile="true">Experiences</x-nav-link>
        <x-nav-link url='/projects' :active="request()->is('projects')" :mobile="true">Projects</x-nav-link>
        <x-nav-link url='/roles' :active="request()->is('roles')" :mobile="true">Roles</x-nav-link>
        @auth
        <li class="relative group">
            <x-nav-link url='/skilldashboard' :active="request()->is('skilldashboard')" :mobile="true">Dashboard</x-nav-link>
            <ul class="absolute left-0 w-40 bg-blue-600 rounded shadow-lg mt-2 hidden group-hover:block">
                <li>
                    <x-nav-link url='/skills' :active="request()->is('skills')" :mobile="true">Skills</x-nav-link>
                </li>
                <li>
                    <x-nav-link url='/categories' :active="request()->is('categories')" :mobile="true">Categories</x-nav-link>
                </li>
                <li>
                    <x-nav-link url='/roles' :active="request()->is('roles')" :mobile="true">Roles</x-nav-link>
                </li>
            </ul>
        </li>
                @else
        <li>
            <x-nav-link url='/skilldashboard' :active="request()->is('skilldashboard')" :mobile="true">Skills</x-nav-link>
        </li>
        @endauth
    </nav>
</header>