@extends('app')
@section('titulo', 'Novo funcionário')

@section('conteudo')
    <a href="{{route('employees.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Novo Funcionário</h1>

    <form method="post" action="{{ route('employees.store') }}">
        @include('employees._form')
    </form>

@endsection