@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;align-items:center;justify-content:center;height:100%;">
            <div class="card" style="width:40%;box-shadow:2px 2px 5px 0.05px #00a4a2;border:1px solid #00a4a2;">
                <div class="card-header" style="color:white;background-color:#00a4a2;">Login</div>
                <!--<div style="background-image:url({{asset('/images/login.jpg')}});background-size:100% 100%;height:100px;width:150px;margin-left:auto;margin-right:auto;margin-top:30px;background-repeat:no-repeat;border-radius:30%;border:1px solid #00a4a2;">
                </div>
                <hr style="background-color:#00a4a2;">-->
                <div class="card-body" style="padding:25px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="login_pair" style="margin-bottom:15px;">
                                <label for="email">Емаил</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="login_pair" style="margin-bottom:10px;">
                                <label for="password">Лозинка</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        <div class="login_pair">
                                <div class="checkbox" style="width:50%;margin-right:20px;" align="right">
                                    <label style="width:100%;margin-bottom:20px;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомни ме
                                    </label>
                                </div>
                            <a href="{{ route('password.request') }}" style="width:50%;">
                                Рестертирај ја лозинката
                            </a>
                        </div>

                        <div style="width:100%; text-align:center;display:flex;flex-direction:row;align-items:center;justify-content:center;">
                                <button type="submit" class="submit_message" style="margin-right:20px;">
                                    Најави се
                                </button>
                                    <button class="submit_message">
                                        <a href="{{ route('register') }}">Registracija</a>
                                    </button>

                        </div>
                    </form>

                </div>
            </div>
    </div>
@endsection
