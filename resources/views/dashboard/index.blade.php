
@extends("layout")

@section("conteudo")

<div class="container col-6">

@if(isset($pessoa->Certificados))
    
    <h1>
        Dados do Certificado
    </h1>
    @foreach($pessoa->Certificados as $certificado)
    <hr>
        
</hr>
    <ul class="list-group ">
        <li class="list-group-item bg-light">
        <strong>DN: </strong>{{$certificado->dn}}
        </li>
        <li class="list-group-item bg-light">
        <strong>IssuerDN: </strong> {{$certificado->issuerDn}}
        </li>
        <li class="list-group-item bg-light">
        <strong>Não antes de: </strong> {{$certificado->notBefore}}
        </li>
        <li class="list-group-item bg-light">
        <strong>Não depois de: </strong> {{$certificado->notAfter}}
        </li>
    @endforeach
    </ul>
@endif 

    <h1 class="mt-4">
        Dados Pessoais
    </h1>
    <hr>
        
    </hr>
    <ul class="list-group list-group-flush ">
        <li class="list-group-item bg-light">
           <strong>Nome: </strong> {{$pessoa->nome}} 
        </li>
        <li class="list-group-item bg-light">
            <strong>Data de Nascimento: </strong> {{$pessoa->dataNascimento}} 
        </li>
        <li class="list-group-item bg-light">
            <strong>CPF: </strong> {{$pessoa->CPF->numero}} 
        </li>
        <li class="list-group-item bg-light">
            <strong>Telefone: </strong> {{$pessoa->Telefone->ddd}} - {{$pessoa->Telefone->numero}} 
        </li>
        <li class="list-group-item bg-light">
        <strong>Endereço: </strong> {{$pessoa->Endereco->rua}},
        {{$pessoa->Endereco->numero}}
        {{$pessoa->Endereco->bairro}},
        {{$pessoa->Endereco->cidade}}-
        {{$pessoa->Endereco->estado}} 
        </li>
    </ul>
</div>

@endsection