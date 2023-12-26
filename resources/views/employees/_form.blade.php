@csrf
<div class="row mb-2">

    <div class="col-md-4">
        <label for="nome" class="form-label">Nome</label>
        <input required value="{{ old('nome', $employee->nome ?? '')}}" type="text" maxlength="100" name="nome" class="form-control" id="nome" placeholder="Nome...">
    </div>
    <div class="col-md-4">
        <label for="cpf" class="form-label">CPF</label>
        <input required value="{{ old('cpf', $employee->cpf ?? '')}}" type="text" name="cpf" class="form-control" id="cpf" data-mask="000.000.000-00" placeholder="CPF..."/>
    </div>
    <div class="col-md-4">
        <label for="data_contratacao" class="form-label">Data Contratação</label>
        <input required class="form-control" name="data_contratacao" value="{{ old('data_contratacao',isset($employee->data_contratacao) ? data_to_br($employee->data_contratacao) : '') }}" id="data_contratacao" type="text" data-mask="00/00/0000" placeholder="Data de contratação"/>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-4">
        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input required  class="form-control" type="text" name="logradouro" maxlength="255" value="{{ old('logradouro',$employee->address->logradouro ?? '')}}" id="logradouro" placeholder="Digite o logradouro">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="numero">Número</label>
            <input required class="form-control" type="text" name="numero" maxlength="20" value="{{ old('numero',$employee->address->numero ?? '')}}" id="numero" placeholder="Digite o número">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input required class="form-control" type="text" name="complemento" maxlength="50" value="{{ old('complemento',$employee->address->complemento ?? '')}}" id="complemento" placeholder="Digite o complemento">
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-3">
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input required  class="form-control" type="text" name="bairro" maxlength="50" value="{{ old('bairro',$employee->address->bairro ?? '')}}" id="bairro" placeholder="Digite o bairro">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input required class="form-control" type="text" name="cidade" maxlength="50" value="{{ old('cidade',$employee->address->cidade ?? '')}}" id="cidade" placeholder="Digite a cidade">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cep">CEP</label>
            <input required class="form-control" type="text" name="cep" value="{{ old('cep',$employee->address->cep ?? '')}}" id="cep" data-mask="00000-000" placeholder="Digite o CEP">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input required class="form-control" type="text" name="estado" value="{{ old('estado',$employee->address->estado ?? '')}}" id="estado" data-mask="SS" placeholder="Digite o estado">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>