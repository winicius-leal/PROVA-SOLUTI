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

    <div class="col-md-6">    
        <form  method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group-prepend ">
                <h1 clas="input-group-text" for="exampleFormControlFile1">Importe o seu certificado</h1>
                <hr>
                <input name="certificado" type="file" class="form-control-file" id="">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
        </form>
    </div>  
</div>
@endsection