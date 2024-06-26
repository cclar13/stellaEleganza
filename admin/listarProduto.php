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

<div class="pags">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
         aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Produtos</a></li>
        </ol>
    </nav>
</div>
<div class="card overflowTable" style="background: transparent;border:none">
    <h4 class="card-header">#Produtos
        <button type="button" class="btn btn-dark" style="float: right"
                onclick="abrirModalProduto('nao','nao', 'nao','nao', 'nao','nao', 'nao','nao','nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao','nao','nao','nao','nao', 'modalAddProduto','A', 'btnAddProduto', 'addProduto', 'frmAddProduto')">
            Cadastrar
        </button>
    </h4>

    <div class="card-body ">
        <table class="table  table-bordered border-dark table-hover text-center overflowTable">
            <thead class="table-dark  ">
            <tr class="overflowTable">
                <th scope="col" style="width: 7%">#</th>
                <th scope="col" style="width: 16%">Gênero</th>
                <th scope="col" style="width: 50%">Nome</th>
                <th scope="col" style="width: 10%">Tipo</th>
                <th scope="col" style="width: 17%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $innerJoinProduto = listarTabelaInnerJoinOrdenada("*", "produto", "sexo", "idsexo", "idsexo", "idproduto", "ASC");
            if ($innerJoinProduto !== False) {
                foreach ($innerJoinProduto as $itemProduto) {
                    $idproduto = $itemProduto->idproduto;
                    $idsexo = $itemProduto->idsexo;
                    $sexo = $itemProduto->sexo;
                    $nomeProduto = $itemProduto->nomeProduto;
                    $tipo = $itemProduto->tipo;
                    $nomeFoto = $itemProduto->nomeFoto;
                    $valor = $itemProduto->valor;
                    $marca = $itemProduto->marca;
                    $cor = $itemProduto->cor;
                    $tamanho = $itemProduto->tamanho;
                    $ativo = $itemProduto->ativo;
                    $telaInicial = $itemProduto->telainicial;
                    $posicao = $itemProduto->posicao;


                    if ($sexo === 'Masculino') {
                        $sexoRoupa = 'masculino';
                    } else {
                        $sexoRoupa = 'feminino';
                    }

                    if ($tipo === 'calca') {
                        $tipoRoupa = 'Calça';
                    } else if ($tipo === 'blazer') {
                        $tipoRoupa = 'Blazer';
                    } else if ($tipo === 'vestido') {
                        $tipoRoupa = 'Vestido';
                    } else if ($tipo === 'camisa') {
                        $tipoRoupa = 'Camisa';
                    }
                    ?>
                    <tr>
                        <th scope="row"><?php echo $contar ?></th>
                        <td><?php echo $sexo ?></td>
                        <td><?php echo $nomeProduto ?></td>
                        <td><?php echo $tipoRoupa ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary "
                                        onclick="abrirModalProduto('<?php echo $idproduto ?>','idVermaisProduto', '<?php echo $idsexo ?>','sexoProdutoVermais', '<?php echo $nomeProduto ?>','nomeProdutoVermais', '<?php echo $tipo ?>','tipoProdutoVermais','<?php echo $nomeFoto ?>','nao','<?php echo $sexoRoupa ?>','fotoVermaisProduto', '<?php echo $valor ?>','valorProdutoVermais','<?php echo $marca ?>', 'nao','<?php echo $cor ?>','corProdutoVermais', '<?php echo $tamanho ?>','tamanhoProdutoVermais','<?php echo $telaInicial ?>','telaInicialProdutoVermais','<?php echo $posicao ?>','posicaoProdutoVermais', 'modalVermaisProduto','A', 'btnVermaisProduto', 'editProduto', 'frmVermaisProduto')">
                                    Ver+
                                </button>
                                <button type="button" class="btn btn-outline-success"
                                        onclick="abrirModalProduto('<?php echo $idproduto ?>','idEditProduto', '<?php echo $idsexo ?>','sexoProdutoEdit', '<?php echo $nomeProduto ?>','nomeProdutoEdit', '<?php echo $tipo ?>','tipoProdutoEdit','<?php echo $nomeFoto ?>','fotoProdutoEdit','nao','nao', '<?php echo $valor ?>','valorProdutoEdit','<?php echo $marca ?>', 'nao','<?php echo $cor ?>','corProdutoEdit', '<?php echo $tamanho ?>','tamanhoProdutoEdit','<?php echo $telaInicial ?>','telaInicialProdutoEdit','<?php echo $posicao ?>','posicaoProdutoEdit', 'modalEditProduto','A', 'btnEditProduto', 'editProduto', 'frmEditProduto')">
                                    <i class="bi bi-pen">Alterar</i>
                                </button>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="abrirModalProduto('<?php echo $idproduto ?>','idDeletarProduto', 'nao','nao', 'nao','nao', 'nao','nao','nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao','nao','nao','nao','nao','modalDeleteProduto','A', 'btnDeleteProduto', 'deleteProduto', 'frmProdutoDelete')">
                                    <i class="bi bi-trash">Deletar</i>
                                </button>
                            </div>
                        </td>

                    </tr>
                    <?php
                    ++$contar;
                }
            } else {

                ?>
                <tr>
                    <td colspan="5" class="text-center">
                        <h4>Nenhum tipo de produto cadastrado no banco</h4>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



