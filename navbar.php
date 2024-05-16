<nav class="navbar navbar-expand-lg marromEscuro" data-bs-theme="dark" id="inicio">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/logoSESemfd/sc.png" alt="Logo Stella Eleganza"
                                                      title="Logo Stella Eleganza" width="50px"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="masculino.php">Masculino</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feminino.php">Feminino</a>
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


<div class="marromEscuro py-3 navSecundaria">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="index.php"><img src="./img/logoSESemfd/sc.png" alt="Logo Stella Eleganza"
                                                      title="Logo Stella Eleganza" width="50px"></a>

        <button id="botao" style="display: block" class="botaoListNavbar" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#navbarLateral"
                aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>

    </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="navbarLateral" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header marromEscuro">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body marromEscuro">
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                <li class="nav-item">
                    <a class="nav-link active" style="margin-left: 10px" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i>
                        Início</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <p class="d-inline-flex gap-1">
                            <button class="btnGeneroAside" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#masculino" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <i class="bi bi-person-standing"></i> Masculino
                            </button>
                        </p>
                        <div class="collapse" id="masculino">
                            <div class="card-body marromEscuro generolist">
                                <a class="nav-link" href="masculino.php"> Todas as roupas</a>
                                <a class="nav-link" href="blazermasculino.php"> Blazers</a>
                                <a class="nav-link" href="camisas.php"> Camisas</a>
                                <a class="nav-link" href="calcamasculina.php"> Calças</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <p class="d-inline-flex gap-1">
                            <button class="btnGeneroAside" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#feminino" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <i class="bi bi-person-standing-dress"></i> Feminino
                            </button>
                        </p>
                        <div class="collapse" id="feminino">
                            <div class="card-body marromEscuro generolist">
                                <a class="nav-link" href="feminino.php"> Todas as roupas</a>
                                <a class="nav-link" href="blazerfeminino.php"> Blazers</a>
                                <a class="nav-link" href="blusas.php"> Blusas</a>
                                <a class="nav-link" href="calcafeminina.php"> Calças</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div style="margin-left: 10px" class="pointer fs-4">
                <a href="contato.php" class="text-white nav-link">
                    <i class="bi bi-person-square"></i> Contato
                </a>
            </div>
        </div>
    </div>
</div>
