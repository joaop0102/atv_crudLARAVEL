@php
    use Illuminate\Support\Facades\Auth;
@endphp

<style>
.navbar {
    background-color: #1f2937;
    border-bottom: 1px solid #374151;
    padding: 0 1rem;
}

.navbar-container {
    max-width: 7xl;
    margin: 0 auto;
    padding: 0 1rem;
}

.navbar-inner {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 4rem;
}

.mobile-menu-button {
    position: absolute;
    inset-y: 0;
    left: 0;
    display: flex;
    align-items: center;
    display: none;
}

.mobile-menu-button-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem;
    background-color: white;
    border: none;
    color: #6b7280;
    cursor: pointer;
    transition: color 0.2s ease, background-color 0.2s ease;
}

.mobile-menu-button-icon:hover {
    color: #4b5563;
}

.user-menu {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-menu a,
.user-menu button {
    padding: 0.5rem 0.75rem;
    border: 1px solid transparent;
    background-color: #4f46e5;
    color: white;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: color 0.2s ease, background-color 0.2s ease, border-color 0.2s ease;
    text-decoration: none;
}

.user-menu a:hover,
.user-menu button:hover {
    background-color: #4338ca;
    border-color: #e5e7eb;
}

.user-menu button {
    background-color: #ef4444;
    border: none;
    color: white;
}

.user-menu button:hover {
    background-color: #dc2626;
}

</style>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-inner">
            <!-- Mobile menu button -->
            <div class="mobile-menu-button">
                <button class="mobile-menu-button-icon">
                    <span class="sr-only">Open main menu</span>
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Exibe o nome do usuário logado -->
            <div style="margin-right: 20px; color: white;">{{ Auth::user()->name }}</div>

            <!-- Links de navegação para usuários autenticados -->
            @auth
                <div class="user-menu">
                    <a href="{{ route('profile.edit') }}">
                        {{ __('Perfil') }}
                    </a>

                    <!-- Link para o post sempre visível -->
                    <a href="{{ route('posts.index') }}">
                        {{ __('Visualizar Post') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            {{ __('Deslogar') }}
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
