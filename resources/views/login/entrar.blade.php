
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>SOLUTI</title>
</head>
<body>       
    <div id="formulario-login" class="bg-white">
     
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
            <h1 class="text-center">Entre na sua conta</h1>
            <input type="email" name="email" id="inputEmail" class="form-control mb-3 mt-3" placeholder="Email" required="" autofocus="">
            <input type="password" name="password" id="inputPassword" class="form-control  mb-3" placeholder="Senha" required="">
            
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
            
            <a href="/" id="forgot_pswd">Esqueceu a senha?</a>
            <hr>

            <a href="/registrar" class="btn btn-primary btn-block text-white" type="button" id=""><i class="fas fa-user-plus"></i> Criar</a>
            </form>            
    </div>

    

    <style>
        #formulario-login
        {
            font-family: "Lucida Console", "Courier New", monospace;
            width:512px;
            margin:10vh auto;
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
    <script src="/script.js"></script>
</body>
</html>