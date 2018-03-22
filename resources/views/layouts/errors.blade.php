@if(count($errors))
    <div class="alert alert-danger pl-0 pr-0" align="left">
        <ul class="no-circle">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif

