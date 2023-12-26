@csrf
<div class="row mb-2">

    <div class="col-md-4">
        <label for="nome" class="form-label">Nome</label>
        <input required value="{{ old('nome', $project->nome ?? '')}}" type="text" maxlength="100" name="nome" class="form-control" id="nome" placeholder="Nome...">
    </div>
    <div class="col-md-4">
        <label for="orcamento" class="form-label">Orçamento</label>
        <input required value="{{ old('orcamento', $project->orcamento ?? '')}}" data-mask="#.##0,00" data-mask-reverse="true" type="text" maxlength="100" name="orcamento" class="form-control" id="orcamento" placeholder="Digite o orçamento...">
    </div>
    <div class="col-md-4">
        <label for="cliente" class="form-label">Cliente</label>
        <select class="form-select" name="client_id" required id="cliente" aria-label="Cliente">
            <option selected>Selecione um cliente</option>
            @foreach ($clients as $client)
                <option 
                {{ ($project->client_id ?? '') === $client->id ? 'selected' : '' }}
                value="{{$client->id}}">
                {{$client->nome}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-4">
        <label for="cpf" class="form-label">Data início</label>
        <input required value="{{ old('data_inicio', isset($project->data_inicio) ? data_to_br($project->data_inicio) : '')}}" type="text" name="data_inicio" class="form-control" id="data_inicio" data-mask="00/00/0000" placeholder="Data de inicio..."/>
    </div>
    <div class="col-md-4">
        <label for="data_final" class="form-label">Data final</label>
        <input required class="form-control" name="data_final" value="{{  old('data_final',isset($project->data_final) ? data_to_br($project->data_final) : '') }}" id="data_final" type="text" data-mask="00/00/0000" placeholder="Data final"/>
    </div>
    <div class="col-md-4">
        <label for="funcionario" class="form-label">Funcionários</label>
        <select class="form-select" name="funcionarios[]" id="funcionario" multiple aria-label="Funcionários alocados">
            @foreach ($employees as $employee)
                <option 
                    {{in_array($employee->id, isset($project) ? $project->employees->pluck('id')->toArray() : [] ) ? 'selected' : ''}}
                    value="{{$employee->id}}">
                    {{$employee->nome}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>