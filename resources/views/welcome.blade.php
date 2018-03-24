@extends('layouts.app')
    @section('content')
        <div class="welcome">
            <div class="background">
                <div class="session_pair">
                    @if(Auth::check())
                        @include('layouts.nav')
                        @endif
                    <div class="img_pair">
                        <img src="{{asset('/images/srce.png')}}">
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
                        <p>Because us thats why</p>
                    </div>
                </div>

                <div class="package">
                    <img src="{{asset('/images/reach.png')}}" onmouseenter="hide_div()" onmouseleave="hide_div()">
                    <div id="kire">
                        <h6>Kako do nas ? </h6>
                        <p>Because us thats why</p>
                    </div>
                </div>

                <div class="package">
                    <img src="{{asset('/images/we.png')}}" onmouseenter="hide_div()" onmouseleave="hide_div()">
                    <div id="kire">
                        <h6>Koi sme nie ? </h6>
                        <p>Because us thats why</p>
                    </div>
                </div>

            </div>

            @if(!empty($message))
                <h1>{{$message}}</h1>
             @endif
            @if(Auth::check()&&auth()->user()->isMaticen())
             <!--<a href="{{ url('/vnesi_pacient')}}" class="btn" role="button">Внеси</a>-->
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








