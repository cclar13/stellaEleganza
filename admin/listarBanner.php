<div class="fs-3 d-flex justify-content-around">
    # Banner

    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal">
        Alterar
    </button>
</div>
<div class="overflowTable">
    <?php
    $banner = listarTabela('*', 'banner');
    if ($banner !== 'Vazio') {
        foreach ($banner as $item) {
            $foto1 = $item->foto1;
            $foto2 = $item->foto2;
            $foto3 = $item->foto3;
            ?>
            <div class="container">

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-4 ">
                        <h3 class="text-center">Imagem 1</h3>
                        <img src="../img/banners/<?php echo $foto1 ?>" alt="" class="img-fluid">

                    </div>
                    <div class="col-4">
                        <h3 class="text-center">Imagem 2</h3>
                        <img src="../img/banners/<?php echo $foto2 ?>" alt="" class="img-fluid">

                    </div>
                    <div class="col-4">
                        <h3 class="text-center">Imagem 3</h3>
                        <img src="../img/banners/<?php echo $foto3 ?>" alt="" class="img-fluid">

                    </div>
                </div>
            </div>

            <?php
        }
        ?>

        <?php
    } else {
        ?>
        <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
            <h1>Página Vazia.</h1>
            <img src="../img/vazio.gif" alt="ERROR 404">
        </div>
        <?php
    }
    ?>
    </tbody>
    </table>
</div>