<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
     aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Administradores</a></li>
    </ol>
</nav>
<div class="card">
    <h4 class="card-header">Administadores
        <button type="button" class="btn btn-primary" style="float: right">Cadastrar</button></h4>

    <div class="card-body">
        <table class="table table-light table-striped table-bordered border-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 5%">#</th>
<!--                <th scope="col" style="width: 10%">Foto</th>-->
                <th scope="col" style="width: 38.6%">Nome</th>
                <th scope="col" style="width: 35%">Email</th>
                <th scope="col" style="width: 21.4%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $listaAdm = listarTabela("*", "adm");
            if ($listaAdm !== "Vazio") {
                foreach ($listaAdm as $itemAdm) {
                    $idadm = $itemAdm->idadm;
                    $fotoAdm = $itemAdm->fotoAdm;
                    $nomeAdm = $itemAdm->nomeAdm;
                    $email = $itemAdm->email;
                    $senha = $itemAdm->senha;
                    $ativo = $itemAdm->ativo;

                    ?>
                    <tr>
                        <th scope="row"><?php echo $idadm ?></th>
<!--                        <td><img src="../img/perfil/--><?php //echo $fotoAdm?><!--" alt="foto do Admnistrador" class="rounded-circle" width="50px" height="50px"></td>-->
                        <td><?php echo $nomeAdm ?></td>
                        <td><?php echo $email ?></td>
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