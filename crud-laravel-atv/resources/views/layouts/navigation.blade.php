@php
    use Illuminate\Support\Facades\Auth;
@endphp
<style>
    .navbar {
        background-color: white;
        border-bottom: 1px solid #e5e7eb; 
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
        justify-content: space-between;
        height: 4rem; 
    }

    /* Botão do Menu Móvel */
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

    /* Trigger do Dropdown */
    .dropdown-trigger {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        border: 1px solid transparent;
        color: #6b7280; /* text-gray-500 */
        background-color: white;
        border-radius: 0.375rem; /* rounded-md */
        font-size: 0.875rem; /* text-sm */
        font-weight: 500; /* font-medium */
        cursor: pointer;
        transition: color 0.2s ease, background-color 0.2s ease, border-color 0.2s ease;
    }

    .dropdown-trigger:hover {
        color: #4b5563; /* text-gray-700 */
        border-color: #e5e7eb; /* border-gray-200 */
    }

    .dropdown-trigger:focus {
        outline: none;
        box-shadow: 0 0 0 2px #4f46e5; /* focus:ring-indigo-500 */
    }

    /* Menu do Dropdown */
    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        width: 12rem; /* largura do dropdown */
        background-color: white;
        border: 1px solid #e5e7eb; /* border-gray-200 */
        border-radius: 0.375rem; /* rounded-md */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* sombra do dropdown */
    }

    .dropdown-menu a {
        display: block;
        padding: 0.5rem 1rem;
        color: #6b7280; /* text-gray-500 */
        text-decoration: none;
        font-size: 0.875rem; /* text-sm */
        font-weight: 500; /* font-medium */
    }

    .dropdown-menu a:hover {
        background-color: #f3f4f6; /* hover:bg-gray-100 */
        color: #4b5563; /* text-gray-700 */
    }

    .dropdown-menu form {
        margin: 0;
    }

    .dropdown-menu form button {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        background-color: transparent;
        border: none;
        color: #ef4444; /* text-red-500 */
        font-size: 0.875rem; /* text-sm */
        text-align: left;
        cursor: pointer;
    }

    .dropdown-menu form button:hover {
        background-color: #fef2f2; /* hover:bg-red-50 */
    }

    /* Mostrar o menu do dropdown quando ativo */
    .dropdown-trigger.active + .dropdown-menu {
        display: block;
    }

    /* Ícones */
    .icon {
        height: 1.25rem;
        width: 1.25rem;
    }

    .dropdown-arrow {
        margin-left: 0.25rem; /* ml-1 */
    }
</style>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-inner">
            <!-- Mobile menu button -->
            <div class="mobile-menu-button">
                <button class="mobile-menu-button-icon">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon for the mobile menu button (e.g., hamburger icon) -->
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Dropdown de configurações -->
            @auth
                <div class="desktop-nav">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="dropdown-trigger">
                                <div>{{ Auth::user()->name }}</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('posts.create')">
                                {{ __('Criar Post') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-trigger">
                                    {{ __('Deslogar') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth
        </div>
    </div>
</nav>
