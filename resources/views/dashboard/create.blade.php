@extends("layout")

@section("conteudo")

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/pessoa/alter/{{$pessoa->id}}">
        @csrf
        <div class="container"> 
            <div class="mb-3 col-6">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input type="text" value="{{$pessoa->nome}}" class="form-control" id="formGroupExampleInput" name="nome">
            </div>
            <div class="row">                 
                <div class="mb-6 col-2">
                    <label for="formGroupExampleInput" class="form-label">Data de Nascimento</label>
                    <input type="date" value="{{$pessoa->dataNascimento}}" class="form-control" id="formGroupExampleInput" name="dataNascimento">
                </div>
                <div class="mb-4 col-2">
                    <label for="formGroupExampleInput" class="form-label">CPF</label>
                    <input type="number" class="form-control" value="{{$pessoa->CPF->numero}}" id="formGroupExampleInput" name="cpf">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-1">
                    <label for="formGroupExampleInput" class="form-label">DDD</label>
                    <input type="number" value="{{$pessoa->Telefone->ddd}}" class="form-control" id="formGroupExampleInput" name="ddd">
                </div>
                <div class="mb-3 col-3">
                    <label for="formGroupExampleInput" class="form-label">Telefone</label>
                    <input type="number" value="{{$pessoa->Telefone->numero}}" class="form-control" id="formGroupExampleInput" name="telefone">
                </div>
            </div>
            
            <div class="mb-3 col-6">
                <label for="formGroupExampleInput" class="form-label">Rua</label>
                <input type="text" value="{{$pessoa->Endereco->rua}}" class="form-control" id="formGroupExampleInput" name="rua">
            </div>

            <div class="row">
                <div class="mb-3 col-1">
                    <label for="formGroupExampleInput" class="form-label">Número</label>
                    <input type="text" value="{{$pessoa->Endereco->numero}}" class="form-control" id="formGroupExampleInput" name="numero">
                </div>
                <div class="mb-3 col-3">
                    <label for="formGroupExampleInput" class="form-label">Bairro/Cidade</label>
                    <input type="text" value="{{$pessoa->Endereco->bairro}}" class="form-control" id="formGroupExampleInput" name="bairro">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="formGroupExampleInput" class="form-label">Estado</label>
                    <input type="text" value="{{$pessoa->Endereco->estado}}" class="form-control" id="formGroupExampleInput" name="estado">
                </div>
                <div class="mb-3 col-3">
                    <label for="formGroupExampleInput" class="form-label">Cidade</label>
                    <input type="text" value="{{$pessoa->Endereco->cidade}}" class="form-control" id="formGroupExampleInput" name="cidade">
                </div>
            </div>   
        </div>

        

        <button class="btn btn-primary" type="submit" >  Salvar</button>
    </form>    
</div>


@endsection