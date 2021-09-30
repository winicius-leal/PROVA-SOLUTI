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

    <div class="container">    
        <form  method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlFile1">Selecione o certificado</label>
                <hr>
                <input name="certificado" type="file" class="form-control-file" id="">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
        </form>
    </div>    
</div>
@endsection