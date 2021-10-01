
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>SOLUTI</title>
</head>
<body>
    <div id="formulario-login" class="bg-transparent">

        <form class="form-signin" method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h1 class="text-center">CRIAR NOVA CONTA</h1>
            <input value="{{old('name')}}" type="text" name="name" id="" class="form-control mb-2" placeholder="Nome"  autofocus="">
            <input value="{{old('email')}}" type="email" name="email" id="" class="form-control mb-2" placeholder="Email"  autofocus="">
            <input value="{{old('password')}}" type="password" name="password" id="" class="form-control mb-2" placeholder="Senha" >
            <input value="{{old('password_confirmation')}}" type="password" name="password_confirmation" id="" class="form-control mb-2" placeholder="Repita a Senha" >
            <input value="{{old('CPF')}}" type="integer" name="CPF" id="" class="form-control mb-2" placeholder="CPF" >
            <input value="{{old('DataNascimento')}}" type="date" name="DataNascimento" id="" class="form-control mb-2" placeholder="Data de Nascimento" >
            <div class="row mb-2">
                <div class="col-3">
                    <input  value="{{old('ddd')}}" type="text" class="form-control" name="ddd" placeholder="DDD">
                </div>
                <div class="col-9">
                    <input value="{{old('telefone')}}" type="text" class="form-control" name = "telefone" placeholder="Telefone">
                </div>
            </div>
            <input value="{{old('rua')}}" type="text" name="rua" id="" class="form-control mb-2" placeholder="Rua" >
            <div class="row mb-2">
                <div class="col-3">
                    <input value="{{old('numero')}}" type="number" name="numero" class="form-control" placeholder="N">
                </div>
                <div class="col-9">
                    <input value="{{old('bairro')}}"  type="text" name="bairro" class="form-control" placeholder="Bairro/Setor">
                </div>
            </div>
            <input value="{{old('cidade')}}" type="text" name="cidade" id="" class="form-control mb-2" placeholder="Cidade" >
            <input value="{{old('estado')}}" type="text" name="estado" id="" class="form-control mb-2" placeholder="Estado" >
        
            <button class="btn btn-success btn-block" type="submit" id="btn-signup"><i class="fas fa-user-plus"></i> Criar Conta</button>
        </form>            
    </div>

    <style>
        #formulario-login
        {
            width:412px;
            margin:10vh auto;
            font-family: "Lucida Console", "Courier New", monospace;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        #formulario-login form 
        {
            width: 100%;
            max-width: 410px;
            padding: 15px;
            margin: auto;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>