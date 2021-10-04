<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>SOLUTI</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-secondary " id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
              <img src="https://www.soluti.com.br/media/logo/stores/1/Logo_horizontal_23x.png" height="60px" class="mb-2">
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="/" class=" text-white list-group-item list-group-item-action bg-transparent fw-bold">
                  <i class="fas fa-home"></i> 
                  Informações
                </a>
                <a href="/certificado/importar" class="text-white list-group-item list-group-item-action bg-transparent  fw-bold">
                  <i class="fas fa-certificate"></i> 
                  Importar Certificado
                </a>
                <a href="/pessoa/alterar" class="text-white list-group-item list-group-item-action bg-transparent fw-bold">
                  <i class="fas fa-user-edit"></i> 
                  Alterar Dados 
                </a>
                <a href="/logout" class=" text-white list-group-item list-group-item-action bg-transparent  fw-bold">
                  <i class="fas fa-power-off me-2"></i>
                  Logout
                </a> 
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-4 ">
   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>@if(isset($pessoa)) {{$pessoa->nome}} @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/pessoa/alterar">Profile</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid d-flex px-4">

                @yield("conteudo")

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <style>

        body{
          font-family: "Apple Color Emoji","Segoe UI Emoji";
        }
      
      #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin 0.25s ease-out;
        -moz-transition: margin 0.25s ease-out;
        -o-transition: margin 0.25s ease-out;
        transition: margin 0.25s ease-out;
        
      }
      
      #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
      }
      
      #sidebar-wrapper .list-group {
        width: 15rem;
        color: white; 
      }
      
      #page-content-wrapper {
        min-width: 100vw;
      }
      
      #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
      }
      
      #menu-toggle {
        cursor: pointer;
      }
      
      .list-group-item {
        border: none;
        padding: 20px 30px;
      }
      
      
      @media (min-width: 768px) {
        #sidebar-wrapper {
          margin-left: 0;
        }
      
        #page-content-wrapper {
          min-width: 0;
          width: 100%;
        }
      
        #wrapper.toggled #sidebar-wrapper {
          margin-left: -15rem;
        }
      }
    </style>
</body>

</html>