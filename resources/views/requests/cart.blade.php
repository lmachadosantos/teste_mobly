@extends('layout')
@section('pagina_titulo', 'Carrinho de Compras')

@section('pagina_conteudo')
    <div class="mb-3">
        <div class="row">
            <div class="col-2 border"><strong>Imagem</strong></div>
            <div class="col-4 border"><strong>Produto</strong></div>
            <div class="col-2 border"><strong>Quantidade</strong></div>
            <div class="col-2 border"><strong>Valor</strong></div>
            <div class="col-2 border"><strong>Remover</strong></div>
        </div>
        @forelse($requestProducts as $requestProduct)
            <div class="row">
                <div class="col-2 border"><img src="@if($requestProduct->product->image) {{ asset('image') }}/{{ $requestProduct->product->image }} @else {{ asset('image/sem-imagem.jpg') }} @endif" class="w-75" /></div>
                <div class="col-4 border">{{ $requestProduct->product->name }}</div>
                <div class="col-2 border">
                    <form action="{{ url('/request/update-item') }}">
                        <input class="form-control" name="amount[{{ $requestProduct->id }}]" value="{{ $requestProduct->amount }}">
                        <input class="btn btn-primary" type="submit" value="Atualizar">
                    </form>
                </div>
                <div class="col-2 border">R$ {{ number_format($requestProduct->value, 2, ',', '.') }}</div>
                <div class="col-2 border">
                    <form action="{{ url('/request/delete-item') }}">
                        <input type="hidden" name="requestProductId[]" value="{{ $requestProduct->id }}">
                        <input class="btn btn-danger" type="submit" value="Remover">
                    </form>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-12 border">
                    <h4 class="text-center">Carrinho vazio!</h4>
                </div>
            </div>
        @endforelse
    </div>
    @if($requestProducts)
        <form action="{{ url('/request/close') }}">
            <div class="mb-3">
                <div class="row">
                    <div class="col-12">
                        <h4>Dados Pessoais:</h4>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label for="name">Nome:</label>
                        <input name="name" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label for="cpf">CPF:</label>
                        <input name="cpf" class="form-control" id="cpf" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label for="zip_code">CEP:</label>
                        <input name="zip_code" class="form-control" id="zip_code" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-8">
                        <label for="address">Endereço:</label>
                        <input name="address" class="form-control" id="address" required>
                    </div>
                    <div class="col-4">
                        <label for="number">Numero:</label>
                        <input name="number" class="form-control" id="number" type="number" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label for="neighborhood">Bairro:</label>
                        <input name="neighborhood" class="form-control" id="neighborhood" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label for="state">Estado:</label>
                        <input name="state" class="form-control" id="state" required>
                    </div>
                    <div class="col-8">
                        <label for="city">Cidade:</label>
                        <input name="city" class="form-control" id="city" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 text-right">
                        <input class="btn btn-primary" type="submit" value="Finalizar Compra">
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection