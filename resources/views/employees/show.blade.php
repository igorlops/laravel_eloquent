@extends('app')
@section('titulo','Funcionário Individual')
@section('conteudo')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="d-flex justify-content-between">
                    <span>Visualizando funcionário</span>
                    <span>#{{$employee->id}}</span>
                </h4>
            </div>
            <div class="card-body">
                <div class="mt-3">
                    <p><strong>Nome: </strong>{{$employee->nome}}</p>
                    <p><strong>CPF: </strong>{{formata_cpf($employee->cpf)}}</p>
                    <p><strong>Data de contratação: </strong>{{data_to_br($employee->data_contratacao)}}</p>
                    <p>
                        <strong>Status do colaborador: </strong>
                        {{situacao_funcionario($employee->data_demissao)}}
                        @if (!$employee->data_demissao)
                            <a href="{{route('employees.inativar',$employee)}}" class="btn btn-danger">Inativar Funcionário</a>
                        @endif
                    </p>
                </div>
            </div>

            
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="d-flex justify-content-between">
                <span>Endereço do funcionário</span>
            </h4>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <p><strong>Logradouro: </strong>{{$employee->address->logradouro ?? ''}}</p>
                <p><strong>Número: </strong>{{$employee->address->numero ?? ''}}</p>
                <p><strong>Complemento: </strong>{{$employee->address->complmento ?? ''}}</p>
                <p><strong>Bairro: </strong>{{$employee->address->bairro ?? ''}}</p>
                <p><strong>Cidade: </strong>{{$employee->address->cidade ?? ''}}</p>
                <p><strong>CEP: </strong>{{formata_cep($employee->address->CEP ?? '')}}</p>
                <p><strong>Estado: </strong>{{$employee->address->estado ?? ''}}</p>
            </div>
        </div>
    </div>
@endsection