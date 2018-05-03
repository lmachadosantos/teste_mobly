@extends('layout')
@section('pagina_titulo', 'Parabéns')

@section('pagina_conteudo')

    <div class="card-deck mb-3 text-center">
        <div class="card mb-4">
            <h4 class="text-center">Pedido realizado com sucesso!</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ url('/') }}" class="btn btn-info">Voltar a home</a>
        </div>
    </div>


@endsection