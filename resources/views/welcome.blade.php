@extends('layouts.app')
    @section('content')
        <div class="welcome">
            <div class="background">
                <div class="session_pair">
                    @if(Auth::check())
                        @include('layouts.nav')
                        @endif
                    <div class="img_pair">
                        <img src="{{asset('/images/srce.png')}}" id="slika_pocetna">
                        <h5>eBolnica e proekt na timot 404, namenet za olesnuvanje na zdravstvenite lica, a pred se i pacientite vo pogled na prevzemanjeto na laboratoriskite rezultati i polesna evidencija pomegu niv.</h5>
                    </div>
                    <div class="a_pair">
                        @if(!Auth::check())
                        <a class="sessionbtn" href="{{ route('login') }}">Najava</a>
                        <a class="sessionbtn" href="{{ route('register') }}">Registracija</a>
                            @endif
                    </div>

                </div>
            </div>

            <div class="expand">
                <div class="package">
                    <img src="{{asset('/images/resize.png')}}" onmouseenter="hide_div()" onmouseleave="hide_div()">
                    <div id="kire">
                        <h6>Zosto nas ? </h6>
                        <ul style="padding-right:5px;">
                            <li>Brzi rezultati</li>
                            <li>Optimiziran pominat pat do niv</li>
                            <li>Efikasna statistika na istite</li>
                        </ul>
                    </div>
                </div>

                <div class="package">
                    <img src="{{asset('/images/reach.png')}}" onmouseenter="hide_div()" onmouseleave="hide_div()">
                    <div id="kire">
                        <h6>Kako do nas ? </h6>
                        <ul style="padding-right:5px;">
                            <li>Posetete go vasiot maticen</li>
                            <li>Podnesete baranje do maticniot za korisnicki profil</li>
                        </ul>
                    </div>
                </div>

                <div class="package">
                    <img src="{{asset('/images/we.png')}}" onmouseenter="hide_div()" onmouseleave="hide_div()">
                    <div id="kire">
                        <h6>Koi sme nie ? </h6>
                        <ul style="padding-right:5px;">
                            <li>404</li>
                            <li>Studenti na ugd</li>
                        </ul>
                    </div>
                </div>

            </div>

            @if(!empty($message))
                <h1>{{$message}}</h1>
             @endif

            @if(!empty($EMBG) || !empty($approved))
                <p>{{$EMBG}}</p>
                <p>{{$approved}}</p>

                <hr>
                @if(!empty($message))
                    <h1>{{$message}}</h1>
                @endif

             @endif

            @if(!empty($error))
                {{$error}}
            @endif
        </div>
    @endsection








