<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");

if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    $fotoAdm = $_SESSION['fotoAdm'];
    //echo '<p class="text-white">'.$idUsuario.'</p>';
} else {
    session_destroy();
    header('location: index.php?error=404');
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Dashboard - Stella Eleganza</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicons/sc.png" class="rounded-circle">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="quasebranco">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 marromEscuro">
            <div class="text-center imagemUser ">
                <?php
                $adm = listarTabela('*', 'adm');
                foreach ($adm as $admin) {
                    $id = $admin->idadm;
                    if ($id === $idUsuario) {
                        $nome = $admin->nomeAdm;
                        $email = $admin->email;
                        $fotoAdm = $admin->fotoAdm;
                        //                    $foto = $admin->foto;
//
//                    if ($foto === ''){
//                        $foto = 'perfil-300x300-4.jpg';
//                    }
                        ?>


                        <img src="../img/perfil/<?php echo $fotoAdm ?>" alt="Foto de perfil" title="Foto de perfil"
                             class="circulo fotoPerfil mt-2 img-fluid ">

                        <p class="fs-3 mt-2"><?php echo $nome ?></p>
                        <p class="mt-1 mb-3"><?php echo $email ?></p>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="mt-4 text-center fs-2">
                <div>Menu</div>
            </div>
            <div class="aside">
                <div class="pointer mt-4" onclick="carregarConteudo('listarBanner')">
                    <i class="bi bi-image-fill"></i>
                    <span>Banner(s)</span>
                </div>
                <div class="pointer mt-4" onclick="carregarConteudo('listarProduto')">
                    <i class="bi bi-box-seam"></i>
                    <span>Produto(s)</span>
                </div>
                <div class="pointer mt-4" onclick="carregarConteudo('listarContato')">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Contato(s)</span>
                </div>
                <div class="pointer mt-4" onclick="carregarConteudo('listarAdm')">
                    <i class="bi bi-file-person"></i>
                    <span>Administrador(es)</span>
                </div>
                <div class="pointer mt-4">
                    <i class="bi bi-door-open"></i>
                    <span><a href="logout.php" class="edicaoLink text-white">Sair</a></span>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div id="show">

            </div>
        </div>
    </div>
</div>

<!-- Modal Banner -->
<div class="modal fade" id="modalBannerEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmBannerEdit" id="frmBannerEdit">

                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="imagem1" name="imagem1">
                        <label class="input-group-text" for="imagem1">Imagem 1</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="imagem2" name="imagem2">
                        <label class="input-group-text" for="imagem2">Imagem 2</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="imagem3" name="imagem3">
                        <label class="input-group-text" for="imagem3">Imagem 3</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditBanner">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Contato -->
<div class="modal fade" id="modalDeleteContato" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Contato</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmContatoDelete" id="frmContatoDelete">

                <div class="modal-body">
                    <input type="hidden" id="idDeletarContato" name="idDeletarContato" hidden="hidden">
                    <h3 class="text-danger">Deletar <span class="text-black" id="nomeDelete" name="nomeDelete"></span>
                    </h3>
                    <p class="alert alert-danger">Tem certeza disto? Esta ação não pode ser desfeita!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteContato">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add Produto -->
<div class="modal fade" id="modalAddProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmAddProduto" id="frmAddProduto">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nome</span>
                                <input type="text" class="form-control" placeholder="Nome do Produto"
                                       aria-label="Nome do Produto" id="nomeProdutoAdd" name="nomeProdutoAdd">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Preco</span>
                                <input type="text" class="form-control dinheiro" placeholder="Valor do Produto"
                                       aria-label="Valor do Produto" id="valorProdutoAdd" name="valorProdutoAdd">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tipo</span>
                                <select class="form-select" aria-label="Default select example" id="tipoProdutoAdd"
                                        name="tipoProdutoAdd">
                                    <option value="blazer" selected>Blazer</option>
                                    <option value="blusa">Blusa</option>
                                    <option value="calca">Calça</option>
                                    <option value="camisa">Camisa</option>
                                    <option value="vestido">Vestido</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Gênero</span>
                                <select class="form-select" aria-label="Default select example" id="sexoProdutoAdd"
                                        name="sexoProdutoAdd">
                                    <option value="2" selected>Masculino</option>
                                    <option value="1">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Foto</span>
                                <input type="file" class="form-control" placeholder="Foto do Produto"
                                       aria-label="Foto do Produto" id="fotoProdutoAdd" name="fotoProdutoAdd"
                                       required="required">
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <div class=" mb-3">
                                <img src="" id="meme-image" alt=""
                                     style="width: 150px;border: 1px black solid;border-radius: 10px"/>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Cor</span>
                                <input type="text" class="form-control" placeholder="Cor do Produto"
                                       aria-label="Cor do Produto" id="corProdutoAdd" name="corProdutoAdd">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tamanho</span>
                                <select class="form-select" aria-label="Default select example"
                                        id="tamanhoProdutoAdd" name="tamanhoProdutoAdd">
                                    <option value="p">P</option>
                                    <option value="m" selected>M</option>
                                    <option value="g">G</option>
                                    <option value="gg">GG</option>
                                    <option value="xg">XG</option>
                                    <option value="xgg">XGG</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tela inicial</span>
                                <select class="form-select" aria-label="Default select example"
                                        id="telaInicialProdutoAdd" name="telaInicialProdutoAdd">
                                    <option value="S">Sim</option>
                                    <option value="N" selected>Não</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnAddProduto">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal ver mais do produto-->
<div class="modal fade" id="modalVermaisProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header marromEscuro">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ver mais</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmVermaisProduto" id="frmVermaisProduto">

                <div class="modal-body quasebranco">
                    <input type="hidden" name="idVermaisProduto" id="idVermaisProduto">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="" alt="" class="img-fluid" id="fotoVermaisProduto">
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="inputInvisivel w-100 fs-4" id="nomeProdutoVermais"
                                         name="nomeProdutoVermais">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 mb-3">
                                    <div class="fs-5">
                                        Preço: R$ <span id="valorProdutoVermais" name="valorProdutoVermais"></span>
<!--                                        <input type="text" class="inputInvisivel dinheiro"-->
<!--                                               placeholder="Valor do Produto"-->
<!--                                               aria-label="Valor do Produto" >-->
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="fs-5 mb-3">
                                        Tipo:
                                        <select class="form-select inputInvisivel" aria-label="Default select example"
                                                id="tipoProdutoVermais"
                                                name="tipoProdutoVermais" disabled>
                                            <option value="blazer" selected>Blazer</option>
                                            <option value="blusa">Blusa</option>
                                            <option value="calca">Calça</option>
                                            <option value="camisa">Camisa</option>
                                            <option value="vestido">Vestido</option>

                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="fs-5 mb-3">
                                        Gênero:
                                        <select class="form-select" aria-label="Default select example"
                                                id="sexoProdutoVermais"
                                                name="sexoProdutoVermais" disabled>
                                            <option value="2">Masculino</option>
                                            <option value="1">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="fs-5 mb-3">
                                        Cor:
                                        <input type="text" class="inputInvisivel" placeholder="Cor do Produto"
                                               aria-label="Cor do Produto" id="corProdutoVermais"
                                               name="corProdutoVermais">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="fs-5 mb-3">
                                        Tamanho:
                                        <select class="form-select inputInvisivel" aria-label="Default select example"
                                                id="tamanhoProdutoVermais" name="tamanhoProdutoVermais" disabled>
                                            <option value="p">P</option>
                                            <option value="m">M</option>
                                            <option value="g">G</option>
                                            <option value="gg">GG</option>
                                            <option value="xg">XG</option>
                                            <option value="xgg">XGG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Tela inicial</span>
                                        <select class="form-select" aria-label="Default select example"
                                                id="telaInicialProdutoVermais" name="telaInicialProdutoVermais">
                                            <option value="S">Sim</option>
                                            <option value="N">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center marromEscuro py-3">
                    <button type="button" class="btn btn-secondary margemDiretaBtn" data-bs-dismiss="modal">Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Produto -->
<div class="modal fade" id="modalEditProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmEditProduto" id="frmEditProduto">

                <div class="modal-body quasebranco">
                    <input type="hidden" name="idEditProduto" id="idEditProduto">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nome</span>
                                <input type="text" class="form-control" placeholder="Nome do Produto"
                                       aria-label="Nome do Produto" id="nomeProdutoEdit" name="nomeProdutoEdit">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Preco</span>
                                <input type="text" class="form-control dinheiro" placeholder="Valor do Produto"
                                       aria-label="Valor do Produto" id="valorProdutoEdit" name="valorProdutoEdit">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tipo</span>
                                <select class="form-select" aria-label="Default select example" id="tipoProdutoEdit"
                                        name="tipoProdutoEdit">
                                    <option value="blazer" selected>Blazer</option>
                                    <option value="blusa">Blusa</option>
                                    <option value="calca">Calça</option>
                                    <option value="camisa">Camisa</option>
                                    <option value="vestido">Vestido</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Gênero</span>
                                <select class="form-select" aria-label="Default select example" id="sexoProdutoEdit"
                                        name="sexoProdutoEdit">
                                    <option value="2">Masculino</option>
                                    <option value="1">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Foto</span>
                                <input type="file" class="form-control" placeholder="Foto do Produto"
                                       aria-label="Foto do Produto" id="fotoProdutoEdit" name="fotoProdutoEdit">
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <div class=" mb-3">
                                <img src="" id="meme-image" alt=""
                                     style="width: 150px;border: 1px black solid;border-radius: 10px"/>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Cor</span>
                                <input type="text" class="form-control" placeholder="Cor do Produto"
                                       aria-label="Cor do Produto" id="corProdutoEdit" name="corProdutoEdit">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tamanho</span>
                                <select class="form-select" aria-label="Default select example"
                                        id="tamanhoProdutoEdit" name="tamanhoProdutoEdit">
                                    <option value="p">P</option>
                                    <option value="m">M</option>
                                    <option value="g">G</option>
                                    <option value="gg">GG</option>
                                    <option value="xg">XG</option>
                                    <option value="xgg">XGG</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tela inicial</span>
                                <select class="form-select" aria-label="Default select example"
                                        id="telaInicialProdutoEdit" name="telaInicialProdutoEdit">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditProduto">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete Produto -->
<div class="modal fade" id="modalDeleteProduto" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="frmProdutoDelete" id="frmProdutoDelete">

                <div class="modal-body quasebranco">
                    <input type="hidden" id="idDeletarProduto" name="idDeletarProduto" hidden="hidden">
                    <p class="alert alert-danger">Tem certeza disto? Esta ação não pode ser desfeita!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteProduto">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal de ver mais sobre o adm-->
<div class="modal fade" id="vermaisAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header marromEscuro">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ver mais</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" name="frmVermaisAdm" id="frmVermaisAdm">
                <div class="modal-body quasebranco">
                    <input type="hidden" name="idVermaisAdm" id="idVermaisAdm">
                    <div class="mt-3 text-center imagemUser">
                        <img src="" alt="" id="fotoVermais" width="230px">
                    </div>
                    <div class="mt-4 text-center">
                        <label for="vermaisNomeAdm" class="label-control fs-4">Nome:</label>
                        <input type="text" name="vermaisNomeAdm" id="vermaisNomeAdm" required="required"
                               class="form-control" disabled alt=""
                               style="background: transparent; border: none; text-align: center;">
                    </div>
                    <div class="mt-3 text-center">
                        <label for="vermaisEmailAdm" class="label-control fs-4">Email:</label>
                        <input type="email" name="vermaisEmailAdm" id="vermaisEmailAdm" required="required"
                               class="form-control" disabled
                               style="background: transparent; border: none; text-align: center;">
                    </div>

                </div>

                <div class="d-flex justify-content-end align-items-center py-3 marromEscuro">
                    <button type="button" class="btn btn-secondary margemDiretaBtn" data-bs-dismiss="modal">Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de adicionar adm-->
<div class="modal fade" id="addAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" name="frmAddAdm" id="frmAddAdm">
                <div class="modal-body quasebranco">
                    <div class="">
                        <label for="addNomeAdm" class="label-control">Nome:</label>
                        <input type="text" name="addNomeAdm" id="addNomeAdm" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="addEmailAdm" class="label-control">Email:</label>
                        <input type="email" name="addEmailAdm" id="addEmailAdm" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="addSenhaAdm" class="label-control">Senha:</label>
                        <input type="password" name="addSenhaAdm" id="addSenhaAdm" class="form-control"
                               required="required">
                    </div>
                    <div class="mt-3">
                        <label for="addFotoAdm" class="label-control">Foto:</label>
                        <input type="file" name="addFotoAdm" id="addFotoAdm" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnAddAdm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de editar adm-->
<div class="modal fade" id="editAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" name="frmEditAdm" id="frmEditAdm">
                <div class="modal-body quasebranco">
                    <input type="hidden" name="idEditAdm" id="idEditAdm">
                    <div class="">
                        <label for="editNomeAdm" class="label-control">Nome:</label>
                        <input type="text" name="editNomeAdm" id="editNomeAdm" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="editEmailAdm" class="label-control">Email:</label>
                        <input type="email" name="editEmailAdm" id="editEmailAdm" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="editSenhaAdm" class="label-control">Senha:</label>
                        <input type="password" name="editSenhaAdm" id="editSenhaAdm" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="editFotoAdm" class="label-control">Foto:</label>
                        <input type="file" name="editFotoAdm" id="editFotoAdm" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditAdm">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de deletar adm-->
<div class="modal fade" id="deleteAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" name="frmDeleteAdm" id="frmDeleteAdm">
                <div class="modal-body quasebranco">
                    <input type="hidden" name="idDeleteAdm" id="idDeleteAdm">
                    <p>Tem certeza que deseja deletar este administrador?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteAdm">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="../js/controle.js"></script>

</body>

</html>