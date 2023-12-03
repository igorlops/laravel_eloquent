@extends('app')
@section('titulo', 'Detalhes do cliente')

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <h2>{{ $client['nome'] }}</h2>
                <p>#{{$client['id']}}</p>
            </div>
            <div class="card-text">
                {{ $client['endereco'] }}
                <br/>
                {{ $client['observacao'] }}
            </div>
        </div>
        <div class="card-footer">
            <a href=" {{ route('clients.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection