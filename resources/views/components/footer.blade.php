<footer class="bg-blue-600 text-black p-4">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Copyright a sinistra -->
        <p class="text-sm">&copy; Stefano Bianda</p>
    
        <!-- Login/Logout a destra -->
        <div>
            @auth
                <x-logout-button />
            @else
                <x-nav-link url='/login' :active="request()->is('login')" icon="user">Login</x-nav-link>
            @endauth
        </div>
    </div>
</footer>