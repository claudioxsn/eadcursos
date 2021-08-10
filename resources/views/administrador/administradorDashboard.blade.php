@extends('administrador.template.template2')

@section('corpo')

<div class="container">
    @if (Session::get('success'))
        <div class=" col-md-12 alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('error'))
        <div class=" col-md-12 alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    </div>       
</section>

@endsection