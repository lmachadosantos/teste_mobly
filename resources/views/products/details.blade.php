@extends('layout')
@section('pagina_titulo', 'Produto')

@section('pagina_conteudo')


    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-12 text-center"><h2>{{ $product->name }}</h2></div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p><strong>Categorias:</strong>
                        @php $arrCategories = [] @endphp
                        @foreach($product->categories as $category)
                            @php array_push($arrCategories, $category->name) @endphp
                        @endforeach
                        {{ implode(', ', $arrCategories) }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="@if($product->image) {{ asset('image')}}/{{ $product->image }} @else {{ asset('image/sem-imagem.jpg') }} @endif" class="w-50" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">@php echo $product->description @endphp</div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-12">
                    <p><strong>Características:</strong>
                        @foreach($product->characteristics as $characteristic)
                            </br> {{ $characteristic->name }}
                        @endforeach
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center"><h4>R$ {{ number_format($product->price, 2, ',', '.') }}</h4></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/request/add') }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-lg btn-block btn-outline-primary">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection