<div class="myNav">
    <a class="brand" href="{{ url('/') }}">404</a>
    @guest
        <div>
            <a class="nav-btn" href="{{ route('login') }}">Најава</a>
            <a class="nav-btn" href="{{ route('register') }}">Регистрација</a>
        </div>
    @else
        <div>
            <a class="nav-btn" href="#">{{ Auth::user()->first_name }}</a>
            <a class="nav-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Одјави се</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @endguest
</div>