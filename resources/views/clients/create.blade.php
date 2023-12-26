@extends('app')
@section('titulo', 'Novo cliente')

@section('conteudo')
    <a href="{{route('clients.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Novo cliente</h1>

    <form method="post" action="{{ route('clients.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input value="{{ old('nome')}}" type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input value="{{ old('endereco')}}" type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço..."/>
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea class="form-control" name="observacao" id="observacao" placeholder="Observação..">{{ old('observacao')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection