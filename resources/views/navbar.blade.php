<!-- Navigation -->
<nav>
    @if (!Auth::check())
        <a href="{{ route('login') }}">Login</a>
        &nbsp;&nbsp;&nbsp;
        <a href="{{ route('register') }}">Register</a>
        &nbsp;&nbsp;&nbsp;
        <br>
    @else
    <strong>Has fet login com a {{ Auth::user()->name }}</strong>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    @endif

    <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autors</a>
    &nbsp;&nbsp;&nbsp;
    
</nav>