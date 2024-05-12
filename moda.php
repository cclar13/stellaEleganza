<?php
include_once('config/conexao.php');
include_once('config/constantes.php');
include_once('func/funcoes.php');
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stella Eleganza</title>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="./favicons/sc.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="quasebranco">

<nav class="navbar navbar-expand-lg marromEscuro" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Masculino</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feminino</a>
                </li>

            </ul>
            <div style="margin-right: 20px" class="pointer">
                <a href="contato.php" class="text-white nav-link">
                    <i class="bi bi-person-square"></i> Contato
                </a>
            </div>
        </div>
    </div>
</nav>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/banners/1.png" class="d-block w-100" alt="Banner 1">
        </div>
        <div class="carousel-item">
            <img src="./img/banners/2.png" class="d-block w-100" alt="Banner 2">
        </div>
        <div class="carousel-item">
            <img src="./img/banners/3.png" class="d-block w-100" alt="Banner 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <div class="fs-3 mt-3">
        Explore por categorias
    </div>
    <div class="d-flex justify-content-around align-items-center mt-5">
        <div>
            <div class="">
                <img src="./img/blazerM1.png" alt="" class="circulo" width="200px">
            </div>
            <div>
                Blazers masculinos
            </div>
        </div>
        <div>
            <div class="">
                <img src="./img/blazerF3.png" alt="" class="circulo" width="200px">
            </div>
            <div>
                Blazers femininos
            </div>
        </div>
        <div>
            <div class="">
                <img src="./img/calcaF2.png" alt="" class="circulo" width="200px">
            </div>
            <div class="text-center mt-1">
                Calças femininas
            </div>
        </div>
        <div>
            <div class="">
                <img src="./img/calcaM1.png" alt="" class="circulo" width="200px">
            </div>
            <div>
                Calças masculinas
            </div>
        </div>

    </div>
    <div class="fs-3 mt-5">
        Produtos mais vendidos
    </div>
    <div class="row mt-5 mb-3">
        <div class="col-lg-3">
            <div class="card quasebranco pointer">
                <img src="./img/roupas/feminino/blazerF2.png" class="card-img-top" alt="...">
                <div class="card-body quasebranco">
                    <h5 class="card-title">Blazer feminino</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card quasebranco pointer">
                <img src="./img/roupas/feminino/vestidoF2.png" class="card-img-top" alt="...">
                <div class="card-body quasebranco">
                    <h5 class="card-title">Vestido</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card quasebranco pointer">
                <img src="./img/roupas/masculino/blazerM3.png" class="card-img-top" alt="...">
                <div class="card-body quasebranco">
                    <h5 class="card-title">Blazer masculino</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card quasebranco pointer">
                <img src="./img/roupas/feminino/calcaF3.png" class="card-img-top" alt="...">
                <div class="card-body quasebranco">
                    <h5 class="card-title">Calça feminino</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid areia">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Stella Eleganza</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Início</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Termos de serviço</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de
                            privacidade</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Suporte</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Sobre nós</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Veja também</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Roupas masculinas</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Roupas femininas</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Blazers
                            masculinos</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Calças femininas</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Camisas</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">

                <ul class="nav flex-column">

                </ul>
            </div>

            <div class="col-md-4 offset-md-1 mb-3">
                <form>
                    <h5>Se increva em nossa revista</h5>
                    <p>Novidades todos os meses em primeira mão para você.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Digite seu email">
                        <button class="botaoRevista" type="button"><b>Inscrever</b></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-5 my-2 border-top">
            <p>©
                <script>document.write(new Date().getFullYear());</script>
                Stella Eleganza. Todos os direitos reservados.
            </p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <i class="bi bi-twitter-x"></i>
                    </a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <i class="bi bi-instagram"></i>
                    </a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <i class="bi bi-threads"></i>
                    </a></li>
            </ul>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="./js/controle.js"></script>
</body>
</html>
