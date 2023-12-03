@extends('app')
@section('titulo', 'Editando cliente')

@section('conteudo')
    <a href="{{route('clients.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Editar cliente</h1>

    <form method="post" action="{{ route('clients.update', $client) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{$client['nome']}}" id="nome" placeholder="Nome...">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{$client['endereco']}}" id="endereco" placeholder="Endereço..."/>
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea class="form-control" name="observacao" id="observacao" placeholder="Observação..">{{$client['observacao']}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection