<!-- Navigation -->
<nav>
    @if(Auth::user())
    <p>Has fet login amb<strong> {{Auth::user()->name}}</strong></p>
    <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autors</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="{{ route('login') }}">Login</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('register') }}">Registre</a>

    @endif

    <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autors</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="{{ route('login') }}">Login</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('register') }}">Registre</a>

 
</nav>
