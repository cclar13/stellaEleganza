<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");


?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Contato</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
            <h2>Entre em contato conosco:</h2>
        </div>
        <div class="col-6 ">
            <form  method="post" id="frmContato" name="frmContato">

                <div class="input-container ">
                    <input type="text" id="nome" name="nome" required="required">
                    <label for="nome" class="label">Seu Nome</label>
                    <div class="underline"></div>
                </div>
                <div class="input-container ">
                    <input type="text" id="telefone" name="telefone" required="required" class="telefoneBR" minlength="14">
                    <label for="telefone" class="label ">Telefone</label>
                    <div class="underline"></div>
                </div>
                <button class="botaoContato" type="submit" onclick="addContato()" >Enviar</button>
            </form>
        </div>
        <div class="col-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3775.072490757377!2d-41.96478547404086!3d-18.88386500658829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb1a7d340d00e43%3A0xf3acb8b7a321ccf2!2sSENAI%20Governador%20Valadares%20UI%20Luiz%20Chaves!5e0!3m2!1spt-BR!2sbr!4v1715363614152!5m2!1spt-BR!2sbr"
                    class="w-100" style="border:1px black solid; height: 500px; border-radius: 20px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
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
<script src="./js/controle.js"></script>

</body>

</html>
