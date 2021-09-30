
@extends("layout")

@section("conteudo")

<div class="container">
    <h3>
        Dados Pessoais
    </h3>
    <ul class="list-group">
        <label></label>
        <li class="list-group-item">
            Nome: {{$pessoa->nome}} 
        </li>
        <li class="list-group-item">
            Data de Nascimento: {{$pessoa->dataNascimento}} 
        </li>
        <li class="list-group-item">
            CPF: {{$pessoa->CPF->numero}} 
        </li>
        <li class="list-group-item">
            Telefone: {{$pessoa->Telefone->ddd}} - {{$pessoa->Telefone->numero}} 
        </li>
        <li class="list-group-item">
            Endereço: {{$pessoa->Endereco->rua}},
            {{$pessoa->Endereco->numero}}
            {{$pessoa->Endereco->bairro}},
            {{$pessoa->Endereco->cidade}}-
            {{$pessoa->Endereco->estado}} 
        </li>
    </ul>

    <h3>
        Dados do Certificado
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
            DN: @if(isset($pessoa->Certificado->dn)) {{$pessoa->Certificado->dn}} @endif 
        </li>
        <li class="list-group-item">
        IssuerDN: @if(isset($pessoa->Certificado->issuerDn)) {{$pessoa->Certificado->issuerDn}}  @endif
        </li>
        <li class="list-group-item">
        Não antes de: @if(isset($pessoa->Certificado->notBefore)){{$pessoa->Certificado->notBefore}}  @endif
        </li>
        <li class="list-group-item">
            Não depis de: @if(isset($pessoa->Certificado->notAfter)) {{$pessoa->Certificado->notAfter}} @endif
        </li>
    </ul>
</div>

@endsection