<div class="myNav" >
    <div class="left-side">
            <a class="navbtn" href="/">
                <i class="fa fa-home" style="font-size:21px;"></i> Home
            </a>
            <a class="navbtn" href="/profile/{{auth()->user()->id}}">
                <i class="fa fa-heartbeat" style="font-size:21px;"></i> {{ Auth::user()->first_name }}
            </a>

            @if(Auth::check() && auth()->user()->isLaborant())
                <a class="navbtn" href="/novi_rez"><i class="fa fa-files-o" style="font-size:21px;"></i> Vnesi rezultati</a>
                <a class="navbtn" href="/svoi_rez/{{auth()->user()->id}}"><i class="fa fa-clipboard" style="font-size:21px;"></i> Tvoi vnesovi</a>
            @endif
        @if(Auth::check()&&auth()->user()->isMaticen())
                <a href="{{ url('/vnesi_pacient')}}" class="navbtn" role="button"><i class="fa fa-id-card-o" style="font-size:21px;"></i> Vnesi nov pacient</a>
                <a href="/inbox" class="navbtn"><i class="fa fa-envelope-o" style="font-size:21px;"></i> Inbox</a>
        @endif
            @if(Auth::check() && auth()->user()->isPacient())
                <a class="navbtn" href="/new_msg/{{auth()->user()->getMaticen()->id}}">
                    <i class="fa fa-envelope-o" style="font-size:21px;"></i> Kontaktiraj maticen
                </a>
            <a href="/inbox" class="navbtn"><i class="fa fa-envelope-o" style="font-size:21px;"></i> Inbox</a>
                <a class="navbtn" href="/svoi_rez/{{auth()->user()->id}}">
                    <i class="fa fa-history" style="font-size:21px;"></i> Istorija na rezultati
                </a>
            @endif
    </div>
            <a class="navbtn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" style="font-size:21px;"></i>Odjavi se</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

</div>