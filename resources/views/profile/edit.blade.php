
<!--
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" action="/edit_pacient/{{$user->id}}" id="register-form">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="име" placeholder="Име..." value="{{$user->first_name}}"><br>
                            <input type="text" class="form-control" name="last_name" placeholder="Презиме..." value="{{$user->last_name}}"><br>
                            <input type="email" class="form-control" name="email" placeholder="Емаил..." value="{{$user->email}}"><br>
                            <input type="password" class="form-control" name="password" placeholder="Лозинка..."><br>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Потврди лозинка..."><br>
                            <input type="text" class="form-control" name="EMBG" placeholder="EMBG..." value="{{$user->EMBG}}"><br>
                            <input type="text" class="form-control" name="mobile" placeholder="Мобилен..." value="{{$user->mobile}}"><br>
                            <input type="text" class="form-control" name="street" placeholder="Улица на живеење..." value="{{$user->address->street}}"><br>
                            <input type="text" class="form-control" name="city" placeholder="Град..." value="{{$user->address->city}}"><br>
                            <input type="text" class="form-control" name="gender" placeholder="Пол..." value="{{$user->gender}}"><br>
                            <input type="date" placeholder="Choose date" name="date_born" class="form-control" value="{{$user->date_born}}"
                                   style="box-shadow:2px 2px 2px 2px #e9ece5;margin-bottom:20px;box-shadow:none;">

                            <br>
                            <div class="pair">
                                <select class="form-control" name="institution" id="institution"><br>
                                    <option value="">Избери институција</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->id}}">{{$institution->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn ml-2" name="new_institution" id="new_institution">Внеси нова</button>
                            </div>

                            <div class="pair">
                                <div id="new_inst">
                                    <input type="text" class="form-control" name="inst_address" placeholder="Institution Address..">
                                    <input type="text" class="form-control" name="inst_name" placeholder="Institution Name..">
                                    <input type="text" class="form-control" name="inst_city" placeholder="Institution City..">
                                    <input type="hidden" name="new_inst_confirm" id="new_inst_confirm" value="">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-register">
                                Потврди
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

-->





@extends('layouts.app')
@include('layouts.nav')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border:1px solid #00a4a2;box-shadow:0.5px 0.5px 2px 0.5px #00a4a2;">
                    <div class="card-header" style="background-color:#00a4a2;color:white;">Register</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="register-form" style="width:100%;">
                            {{csrf_field()}}
                            <div class="register_pair" style="width:100%;margin-left:20px;" >
                                <label>Ime</label>
                                <input type="text" class="form-control" name="име" placeholder="Ime..." value="{{$user->first_name}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Prezime</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Prezime..." value="{{$user->last_name}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email..." value="{{$user->email}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Lozinka</label>
                                <input type="password" class="form-control" name="password" placeholder="Lozinka...">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Potvrdi Lozinka</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Potvrdi Lozinka...">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>EMBG</label>
                                <input type="text" class="form-control" name="EMBG" placeholder="EMBG..." value="{{$user->EMBG}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Mobilen</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobilen..." value="{{$user->mobile}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Ulica</label>
                                <input type="text" class="form-control" name="street" placeholder="Ulica..." value="{{$user->street}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Grad</label>
                                <input type="text" class="form-control" name="city" placeholder="Grad..." value="{{$user->city}}">
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Pol</label>
                                <div class="radio" style="width:75%;">
                                    <label style="width:35%;"><input type="radio" name="gender" style="margin-right:50px;width:50%;">Masko</label>
                                    <label style="width:35%;"><input type="radio" name="gender" style="width:50%;">Zensko</label>
                                </div>
                            </div>
                            <div class="register_pair" style="width:100%;margin-left:20px;" align="left">
                                <label>Data na raganje</label>
                                <input type="date" placeholder="Choose date" name="date_born" class="form-control"
                                       style="box-shadow:2px 2px 2px 2px #e9ece5;margin-bottom:20px;box-shadow:none;" value="{{$user->date_born}}">
                            </div>
                            <label style="width:100%;margin-bottom:0;" align="left">Institucija</label>
                            <div class="pair" style="width:100%;margin-top:10px;">
                                <select class="form-control" name="institution" id="institution"><br>
                                    <option value="">Избери институција</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->id}}">{{$institution->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn ml-2" name="new_institution" id="new_institution">Внеси нова</button>
                            </div>

                            <div class="pair mt-0" style="width:100%;">
                                <div id="new_inst" style="width:100%;">

                                    <div class="register_pair" style="width:100%;" align="left">
                                        <label>Ime</label>
                                        <input type="text" class="form-control" name="inst_name" placeholder="Institution Name..">
                                    </div>

                                    <div class="register_pair" style="width:100%;" align="left">
                                        <label>Ulica</label>
                                        <input type="text" class="form-control" name="inst_address" placeholder="Institution Address..">
                                    </div>

                                    <div class="register_pair" style="width:100%;" align="left">
                                        <label>Grad</label>
                                        <input type="text" class="form-control" name="inst_city" placeholder="Institution City..">
                                    </div>
                                    <input type="hidden" name="new_inst_confirm" id="new_inst_confirm" value="">
                                </div>

                            </div>

                            <div style="width:100%;display:flex;flex-direction:row;justify-content:center;margin-top:25px;">
                                <button type="submit" class="submit_message" style="margin-right:20px;">
                                    Potvrdi
                                </button>
                                <button class="submit_message">
                                    <a href="{{ route('login') }}">Najavi se</a>
                                </button
                            </div>
                        </form>

                    </div>
                    @include('layouts.errors')
                </div>
            </div>
        </div>
    </div>


@endsection
