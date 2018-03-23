@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/vnesuvanje_na_pacient') }}" id="register-form">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="име" placeholder="Име..."><br>
                        <input type="text" class="form-control" name="презиме" placeholder="Презиме..."><br>
                        <input type="email" class="form-control" name="Имејл" placeholder="Емаил..."><br>
                        <input type="password" class="form-control" name="лозинка" placeholder="Лозинка..."><br>
                        <input type="password" class="form-control" name="лозинка_confirmation" placeholder="Потврди лозинка..."><br>
                        <input type="text" class="form-control" name="матичен" placeholder="EMBG..."><br>
                        <input type="text" class="form-control" name="Мобилен" placeholder="Мобилен..."><br>
                        <input type="text" class="form-control" name="Улица" placeholder="Улица на живеење..."><br>
                        <input type="text" class="form-control" name="Град" placeholder="Град..."><br>
                        <input type="text" class="form-control" name="Пол" placeholder="Пол..."><br>
                        <input type="date" placeholder="Choose date" name="Дата" class="form-control"
                                   style="box-shadow:2px 2px 2px 2px #e9ece5;margin-bottom:20px;box-shadow:none;">
                        <br>
                        <div class="pair">
                            <select class="form-control" name="институција" id="institution"><br>
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
                        <input type="hidden" name="approved" value="2">
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