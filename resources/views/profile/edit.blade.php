@extends('layouts.app')

@section('content')

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
                        @include('layouts.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
