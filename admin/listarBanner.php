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

<div class="fs-3 d-flex justify-content-around mt-3">
    # Banner

    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" onclick="abrirModalBanner('imagem1','imagem2','imagem3','imagem4','modalBannerEdit', 'A', 'btnEditBanner', 'bannerEdit','modalBannerEdit')">
        Alterar
    </button>
</div>
<div class="overflowTable mb-5">
    <?php
    $banner = listarTabela('*', 'banner');
    if ($banner !== False) {
        foreach ($banner as $item) {
            $foto1 = $item->foto1;
            $foto2 = $item->foto2;
            $foto3 = $item->foto3;
            $foto4 = $item->foto4;
            ?>
            <div class="container">

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 ">
                        <h3 class="text-center">Imagem 1</h3>
                        <img src="../img/banners/<?php echo $foto1 ?>" alt="" class="img-fluid">

                    </div>
                    <div class="col-12 ">
                        <h3 class="text-center">Imagem 2</h3>
                        <img src="../img/banners/<?php echo $foto2 ?>" alt="" class="img-fluid">

                    </div>
                    <div class="col-12 ">
                        <h3 class="text-center">Imagem 3</h3>
                        <img src="../img/banners/<?php echo $foto3 ?>" alt="" class="img-fluid">

                    </div>
                    <div class="col-12 ">
                        <h3 class="text-center">Imagem 4</h3>
                        <img src="../img/banners/<?php echo $foto4 ?>" alt="" class="img-fluid">
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
</div>