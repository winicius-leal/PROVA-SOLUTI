
@extends("layout")

@section("conteudo")

<div class="container">
    
@if(isset($pessoa->Certificado))
    <h3>
        Dados do Certificado
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
        <strong>DN: </strong>  @if(isset($pessoa->Certificado->dn)) {{$pessoa->Certificado->dn}} @endif 
        </li>
        <li class="list-group-item">
        <strong>IssuerDN: </strong> @if(isset($pessoa->Certificado->issuerDn)) {{$pessoa->Certificado->issuerDn}}  @endif
        </li>
        <li class="list-group-item">
        <strong>Não antes de: </strong> @if(isset($pessoa->Certificado->notBefore)){{$pessoa->Certificado->notBefore}}  @endif
        </li>
        <li class="list-group-item">
        <strong>Não depois de: </strong> @if(isset($pessoa->Certificado->notAfter)) {{$pessoa->Certificado->notAfter}} @endif
        </li>
    </ul>
    @endif 

    <h3 class="mt-4">
        Dados Pessoais
    </h3>
    <ul class="list-group list-group-flush ">
        <li class="list-group-item">
           <strong>Nome: </strong> {{$pessoa->nome}} 
        </li>
        <li class="list-group-item">
            <strong>Data de Nascimento: </strong> {{$pessoa->dataNascimento}} 
        </li>
        <li class="list-group-item">
            <strong>CPF: </strong> {{$pessoa->CPF->numero}} 
        </li>
        <li class="list-group-item">
            <strong>Telefone: </strong> {{$pessoa->Telefone->ddd}} - {{$pessoa->Telefone->numero}} 
        </li>
        <li class="list-group-item">
        <strong>Endereço: </strong> {{$pessoa->Endereco->rua}},
        {{$pessoa->Endereco->numero}}
        {{$pessoa->Endereco->bairro}},
        {{$pessoa->Endereco->cidade}}-
        {{$pessoa->Endereco->estado}} 
        </li>
    </ul>
</div>

@endsection