<?php
include_once('./config/conexao.php');
include_once('./config/constantes.php');
include_once('./func/funcoes.php');


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stella Eleganza</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicons/sc.png" class="rounded-circle">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="quasebranco">

<?php include_once('navbar.php') ?>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $banner = listarTabela('*', 'banner');
        foreach ($banner as $item) {
            $foto1 = $item->foto1;
            $foto2 = $item->foto2;
            $foto3 = $item->foto3;

            ?>
            <div class="carousel-item active">
                <img src="./img/banners/<?php echo $foto1 ?>" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="./img/banners/<?php echo $foto2 ?>" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="./img/banners/<?php echo $foto3 ?>" class="d-block w-100" alt="Banner 3">
            </div>
            <?php
        }
        ?>
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
    <div class="fs-3 mt-3 secao">
        Explore por nossas categorias
    </div>
    <div class="row mt-2">
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="blazermasculino.php" class="edicaoLink">
                <div class="">
                    <img src="./img/blazerM1.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1">
                    Blazers masculinos
                </div>
            </a>

        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="blazerfeminino.php" class="edicaoLink">
                <div class="">
                    <img src="./img/blazerF3.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1 pointer">
                    Blazers femininos
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="camisas.php" class="edicaoLink">
                <div class="">
                    <img src="./img/camisaM2.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1 pointer">
                    Camisas
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="blusas.php" class="edicaoLink">
                <div class="">
                    <img src="./img/camisaF2.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1 pointer">
                    Blusas
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="calcafeminina.php" class="edicaoLink">
                <div class="">
                    <img src="./img/calcaF2.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1 pointer">
                    Calças femininas
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-3">
            <a href="calcamasculina.php" class="edicaoLink">
                <div class="">
                    <img src="./img/calcaM1.png" alt="" class="circulo pointer" height="200px">
                </div>
                <div class="text-center mt-1 pointer">
                    Calças masculinas
                </div>
            </a>
        </div>
    </div>

    <div class="fs-3 mt-5 secao">
        Produtos mais vendidos
    </div>

    <div class="row mt-3 mb-3 d-flex justify-content-center align-items-center">
        <?php
        $produto = listarItensExpecificosProduto('*', 'produto', 'telainicial', 'S', 'posicao', 'C');
        if ($produto !== 'vazio') {
            foreach ($produto as $products) {
                $id = $products->idproduto;
                $nome = $products->nomeProduto;
                $preco = $products->valor;
                $foto = $products->nomeFoto;
                $idsexo = $products->idsexo;


                if ($idsexo === 1) {
                    $sexo = "feminino";
                } else {
                    $sexo = "masculino";
                }

                ?>
                <div class="col-lg-3 col-md-6 col-6 mt-3">
                    <div class="card quasebranco">
                        <img src="./img/roupas/<?php echo $sexo ?>/<?php echo $foto ?>" class="card-img-top" alt="...">
                        <div class="card-body quasebranco minHeightCard">
                            <h5 class="card-title">
                                <?php echo $nome ?>
                            </h5>
                            <hr>
                            <div class="d-flex align-items-center">
                                <div>Preço: R$ </div>
                                <div><?php echo $preco ?></div>
                            </div>
                            <hr>
                            <div>
                                <form action="produto.php" method="get">
                                    <input type="hidden" name="produto" value="<?php echo $id ?>">
                                    <button type="submit" class="btnVerProduto">Ver produto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="fs-1 mb-4">
                    Seção vazia
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="bannerFixo mb-2 mt-4">
        <img src="./bannerRotativos/4.png" alt="" width="100%">
    </div>

    <div class="fs-3 mt-5 secao">
        Nunca sai de moda
    </div>

    <div class="row mt-3 mb-3 d-flex justify-content-center align-items-center">
        <?php
        $produto = listarItensExpecificosProduto('*', 'produto', 'telainicial', 'S', 'posicao', 'F');
        if ($produto !== 'vazio') {
            foreach ($produto as $products) {
                $id = $products->idproduto;
                $nome = $products->nomeProduto;
                $preco = $products->valor;
                $foto = $products->nomeFoto;
                $idsexo = $products->idsexo;


                if ($idsexo === 1) {
                    $sexo = "feminino";
                } else {
                    $sexo = "masculino";
                }

                ?>
                <div class="col-lg-3 col-md-6 col-6 mt-3">
                    <div class="card quasebranco">
                        <img src="./img/roupas/<?php echo $sexo ?>/<?php echo $foto ?>" class="card-img-top" alt="...">
                        <div class="card-body quasebranco minHeightCard">
                            <h5 class="card-title">
                                <?php echo $nome ?>
                            </h5>
                            <hr>
                            <div class="d-flex align-items-center">
                                <div>Preço: R$ </div>
                                <div><?php echo $preco ?></div>
                            </div>
                            <hr>
                            <div>
                                <form action="produto.php" method="get">
                                    <input type="hidden" name="produto" value="<?php echo $id ?>">
                                    <button type="submit" class="btnVerProduto">Ver produto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="fs-1 mb-4">
                    Seção vazia
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<?php include_once('footer.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="./js/controle.js"></script>
</body>

</html>