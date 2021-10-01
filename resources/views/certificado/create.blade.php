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

    <div class="container col-6">    
        <form  method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group-prepend ">
                <label clas="input-group-text" for="exampleFormControlFile1">Selecione o certificado</label>
                <hr>
                <input name="certificado" type="file" class="form-control-file" id="">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
        </form>
    </div>    
</div>
@endsection