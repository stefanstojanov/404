@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="име" placeholder="Име..."><br>
                        <input type="text" class="form-control" name="last_name" placeholder="Презиме..."><br>
                        <input type="email" class="form-control" name="email" placeholder="Емаил..."><br>
                        <input type="password" class="form-control" name="password" placeholder="Лозинка..."><br>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Потврди лозинка..."><br>
                        <input type="text" class="form-control" name="EMBG" placeholder="EMBG..."><br>
                        <input type="text" class="form-control" name="mobile" placeholder="Мобилен..."><br>
                        <input type="text" class="form-control" name="street" placeholder="Улица на живеење..."><br>
                        <input type="text" class="form-control" name="city" placeholder="Град..."><br>
                        <input type="text" class="form-control" name="gender" placeholder="Пол..."><br>
                        <select name="type" class="form-control">
                            <option value="Матичен">Матичен</option>
                            <option value="Лаборант">Лаборант</option>
                        </select>
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
