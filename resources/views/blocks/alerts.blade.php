
@if (isset($alerts))

    @foreach ($alerts as $key=>$alert)
        @foreach($alert as $not)
            <div class="alert alert-{{$key}} alert-dismissible fade show" role="alert">
                <strong>{{$key}}</strong> {{$not}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach

    @endforeach

@endif
@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> {{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach

@endif
