@extends('layout')
@section('pagina_titulo', 'Produtos')

@section('pagina_conteudo')

<div class="mb-3">
    <select name="category" id="category" class="col-12">
        <option value="">Selecione a categoria</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($categoryId == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="card-deck mb-3 text-center">

    @forelse($products as $product)

            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><img src="@if($product->image) {{ asset('image') }}/{{ $product->image }} @else {{ asset('image/sem-imagem.jpg') }} @endif" class="w-75" /></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$ {{ number_format($product->price, 2, ',', '.') }}</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="font-weight-bold">{{ $product->name }}</li>
                        <li>
                            @php $arrCategories = [] @endphp
                            @foreach($product->categories as $category)
                                @php array_push($arrCategories, $category->name) @endphp
                            @endforeach
                            {{ implode(', ', $arrCategories) }}
                        </li>
                    </ul>
                    <a href="{{ url('/product') }}/{{ $product->id }}" class="btn btn-info">Detalhes</a>
                </div>
            </div>

    @empty
        <div class="card mb-4">
            <h4 class="text-center">Nenhum produto localizado!</h4>
        </div>
    @endforelse

</div>

<script>
    $( "#category" ).change(function() {

        if($(this).val() > 0) {
            window.location.href = "{{ url('/search') }}/" + $(this).val();
        }else{
            window.location.href = "{{ url('/') }}";
        }

    });
</script>

@endsection