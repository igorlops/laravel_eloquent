@extends('app')
@section('titulo', 'Lista de employeees')

@section('conteudo')
    <h1>Todos os nosso funcionários:</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Contratação</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee['id'] }}</th>
                    <td><a href=" {{ route('employees.show',$employee)}} ">{{$employee['nome']}}</a></td>
                    <td>{{ data_to_br($employee['data_contratacao']) }}</td>
                    <td>{{ situacao_funcionario($employee['data_demissao']) }}</td>
                    <td class="d-flex justify-content-center flex-row">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Editar</a>
                        <form action="{{route('employees.destroy', $employee)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td></td>
                        <td>Nenhum funcionário cadastrado</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{$employees->links()}}
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Novo funcionário</a>

@endsection