<div class="pags">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
         aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Produtos</a></li>
        </ol>
    </nav>
</div>
<div class="card">
    <h5 class="card-header">#Produtos
        <button type="button" class="btn btn-primary" style="float: right">Cadastrar</button>
    </h5>
    <div class="card-body">
        <table class="table table-light table-striped table-bordered border-dark table-hover ">
            <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col" style="width: 10%">Sexo</th>
                <th scope="col" style="width: 58.5%">Nome</th>
                <th scope="col" style="width: 5%">Tipo</th>
                <th scope="col" style="width: 21.5%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $innerJoinProduto = listarTabelaInnerJoinOrdenada("*", "produto", "sexo", "idsexo", "idsexo", "idproduto", "ASC");
            if ($innerJoinProduto !== "False") {
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

                    ?>
                    <tr>
                        <th scope="row"><?php echo $idproduto ?></th>
                        <td><?php echo $sexo ?></td>
                        <td><?php echo $nomeProduto ?></td>
                        <td><?php echo $tipo ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary">Ver+</button>
                                <button type="button" class="btn btn-outline-success"><i class="bi bi-pen">Alterar</i></button>
                                <button type="button" class="btn btn-outline-danger"><i class="bi bi-trash">Deletar</i></button>
                            </div>
                        </td>

                    </tr>
                    <?php
                }
            } else {
                ++$contar;
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