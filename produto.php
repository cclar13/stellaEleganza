<?php
include_once('config/conexao.php');
include_once('config/constantes.php');
include_once('func/funcoes.php');
$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $idproduto = $dados['produto'];
}

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
    <link rel="icon" type="image/png" sizes="16x16" href="./favicons/sc.png" class="rounded-circle">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

</head>
<body class="quasebranco">

<?php include_once('navbar.php') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-12 text-center">
            <?php
            $fotoProduto = listarItemExpecifico('*', 'produto', 'idproduto', "$idproduto");
            foreach ($fotoProduto as $foto) {
                $pasta = $foto->idsexo;
                $nomeFoto = $foto->nomeFoto;

                if ($pasta == 1) {
                    $pasta = 'feminino';
                } else {
                    $pasta = 'masculino';
                }

                ?>
                <img src="./img/roupas/<?php echo $pasta ?>/<?php echo $nomeFoto ?>" alt="" height="80%" class="mt-4">
            <?php } ?>
        </div>
        <div class="col-lg-7">
            <?php
            $produto = listarItemExpecifico('*', 'produto', 'idproduto', "$idproduto");
            foreach ($produto as $product) {
                $nome = $product->nomeProduto;
                $preco = $product-> valor;
            }
            ?>
            <h5 class="mt-5"><?php echo $nome ?></h5>
            <h3 class="mt-3 text-success">R$ <?php echo $preco?></h3>
            <hr>
            <p>Tamanho</p>
            <div class="col-4 d-flex justify-content-around align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        P
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        M
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        G
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        GG
                    </label>
                </div>
            </div>
            <hr>
            <div>Estoque: 67</div>
            <div class="mt-3 d-flex align-items-center">
                <p>Quantidade: <input id="qtdProduto" value="0" disabled class="text-black" style="border: none; background: transparent;"></p> <button id="diminuirQtd" class="btnQtd">-</button><button class="btnQtd" id="aumentarQtd">+</button>
            </div>
            <div class="mt-5 text-center ">
                <button class="botaoAddCarrinho" onclick="">Adicionar ao carrinho</button>
            </div>
        </div>
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="./js/controle.js"></script>
</body>
</html>
