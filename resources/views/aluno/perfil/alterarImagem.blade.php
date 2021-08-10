@extends('profissional.template.template2')

@section('corpo')
    <div class="container">
        @if(Session::get('success') || Session::get('error'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-{{Session::get('success') ? 'success' : 'danger'}} alert-dismissible fade show" role="alert">
                    {!! Session::get('success') ? Session::get('success') : Session::get('error') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="form-group col-sm-8 col-md-8 col-lg-5 mb-4">
                <form id="formRecortarImagem" action="{{ route('profissional.perfil.post_alterar_imagem') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input id="recorte_width" type="hidden" name="recorte_width">
                    <input id="recorte_height" type="hidden" name="recorte_height">
                    <input id="recorte_x" type="hidden" name="recorte_x">
                    <input id="recorte_y" type="hidden" name="recorte_y">

                    <div class="custom-file">
                        <input id="imagem-input" class="custom-file-input" type="file" name="foto_perfil" accept="image/png, image/jpeg">
                        <label class="custom-file-label" for="customFile">Selecione um arquivo</label>
                    </div>
                    @if ($errors->has('foto_perfil'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('foto_perfil') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="row justify-content-center" style="height: 600px;">
            <div id="divRecortarImagem" class="col-sm-8 col-md-8 col-lg-8 p-2" style="max-height: 100%;">

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col footer text-right">
                <button id="btnConfirmarRecorteImagem" type="submit" form="formRecortarImagem" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
@endsection
