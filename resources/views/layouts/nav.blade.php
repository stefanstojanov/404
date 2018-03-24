<div class="myNav" >
    <a class="brand" href="{{ url('/') }}">
        <img src="{{asset('/images/srce.png')}}">
    </a>

    @guest
        <div>
            <a class="nav-btn" href="{{ route('login') }}">Најава</a>
            <a class="nav-btn" href="{{ route('register') }}">Регистрација</a>
        </div>
    @else

    <div>
            <a class="nav-btn" href="/profile/{{auth()->user()->id}}">{{ Auth::user()->first_name }}</a>
            @if(Auth::check() && auth()->user()->isLaborant())
                <a class="nav-btn" href="/novi_rez">Vnesi rezultati</a>
                <a class="nav-btn" href="/svoi_rez">Tvoi vnesovi</a>
            @endif

            @if(Auth::check() && auth()->user()->isPacient())
                <a class="nav-btn" href="/new_msg/{{auth()->user()->getMaticen()->id}}">Kontaktiraj maticen</a>
                <a class="nav-btn" href="/svoi_rez">Istorija na rezultati</a>
            @endif

            <a class="nav-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Одјави се</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
     </div>
    @endguest
</div>