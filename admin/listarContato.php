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

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
     aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Contato</a></li>
    </ol>
</nav>
<div class="card overflowTable" style="background: transparent;border:none">
    <div class="card-header">
        <h4>#Contato</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered border-dark  table-hover text-center">
            <thead class="table-dark">
            <tr class="overflowTable">
                <th scope="col" style="width: 7.1%">#</th>
                <th scope="col" style="width: 45%">Nome</th>
                <th scope="col" style="width: 40%">Telefone</th>
                <th scope="col" style="width: 7.9%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 0;
            $listaContato = listarTabelaOrdenada("*", "contato", 'nomeContato', 'ASC');
            if ($listaContato !== False) {
                foreach ($listaContato as $itemContato) {
                    $idcontato = $itemContato->idcontato;
                    $nomeContato = $itemContato->nomeContato;
                    $telefone = $itemContato->telefone;
                    $contar = $contar + 1;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $contar ?></th>
                        <td><?php echo $nomeContato ?></td>
                        <td><?php echo $telefone ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="abrirModalContato('<?php echo $idcontato ?>','idDeletarContato','<?php echo $nomeContato ?>','nomeDelete' ,'modalDeleteContato','A', 'btnDeleteContato', 'deleteContato', 'frmContatoDelete')">
                                    <i class="bi bi-trash">Deletar</i></button>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {

                ?>
                <tr>
                    <td colspan="5" class="text-center">
                        <h4>Nenhum contato cadastrado no banco</h4>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>