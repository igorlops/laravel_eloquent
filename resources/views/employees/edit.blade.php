@extends('app')
@section('titulo', 'Edição de funcionário')

@section('conteudo')
    <a href="{{route('employees.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Editar Funcionário {{$employee->id}}</h1>

    <form method="post" action="{{ route('employees.update',$employee) }}">
        @method('put')
        @include('employees._form')
    </form>

@endsection