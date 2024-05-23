<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");

if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    $fotoAdm = $_SESSION['fotoAdm'];
} else {
    session_destroy();
    header('location: index.php?error=404');
}
?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
     aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Administradores</a></li>
    </ol>
</nav>
<div class="card " style="background: transparent;border:none">
    <h4 class="card-header">#Administadores
        <button type="button" class="btn btn-dark" style="float: right" onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao', 'nao','nao','nao','addAdm','<?php echo DATATIMEATUAL?>','A','btnAddAdm','addAdm','addFotoAdm','nao','nao','frmAddAdm')">Cadastrar</button></h4>

    <div class="card-body">
        <table class="table table-bordered border-dark table-hover text-center">
            <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 5%">#</th>
<!--                <th scope="col" style="width: 10%">Foto</th>-->
                <th scope="col" style="width: 43%">Nome</th>
                <th scope="col" style="width: 35%">Email</th>
                <th scope="col" style="width: 18%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $listaAdm = listarTabela("*", "adm");
            if ($listaAdm !== False) {
                foreach ($listaAdm as $itemAdm) {
                    $idadm = $itemAdm->idadm;
                    $fotoAdm = $itemAdm->fotoAdm;
                    $nomeAdm = $itemAdm->nomeAdm;
                    $email = $itemAdm->email;
                    $senha = $itemAdm->senha;
                    $ativo = $itemAdm->ativo;
                    $foto = $itemAdm->fotoAdm;

                    ?>
                    <tr>
                        <th scope="row"><?php echo $contar ?></th>
                        <td><?php echo $nomeAdm ?></td>
                        <td><?php echo $email ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" onclick="abrirModalJsAdm('<?php echo $idadm?>','idVermaisAdm','nao','nao','<?php echo $foto?>','vermaisNomeAdm','<?php echo $nomeAdm?>', 'vermaisEmailAdm','<?php echo $email?>','nao','nao','vermaisAdm','<?php echo DATATIMEATUAL?>','A','btnVermaisAdm','vermaisAdm','editFotoAdm','nao','nao','frmVermaisAdm')">Ver+</button>
                                <button type="button" class="btn btn-outline-success" onclick="abrirModalJsAdm('<?php echo $idadm?>','idEditAdm','nao','nao','nao','editNomeAdm','<?php echo $nomeAdm?>', 'editEmailAdm','<?php echo $email?>','nao','nao','editAdm','<?php echo DATATIMEATUAL?>','A','btnEditAdm','editAdm','nao','nao','nao','frmEditAdm')"><i class="bi bi-pen">Alterar</i></button>
                                <button type="button" class="btn btn-outline-danger" onclick="abrirModalJsAdm('<?php echo $idadm?>','idDeleteAdm','nao','nao','nao','nao','nao', 'nao','nao','nao','nao','deleteAdm','<?php echo DATATIMEATUAL?>','A','btnDeleteAdm','deleteAdm','nao','nao','nao','frmDeleteAdm')"><i class="bi bi-trash">Deletar</i></button>
                            </div>
                        </td>
                    </tr>
                    <?php
                    ++$contar;
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center">
                        <h4>Nenhum Administrador cadastrado no banco</h4>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>