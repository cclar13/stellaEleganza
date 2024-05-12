<?php

include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);

//if ($_SESSION['idadm']) {
//    $idUsuario = $_SESSION['idadm'];
//    $senhaAdm = $_SESSION['senhaAdm'];
//
//    $resultadoSenha = verificarSenhaAutomatica($idUsuario, $senhaAdm);
//
//    if ($resultadoSenha !== 'deBOA') {
//        session_destroy();
//        header('location:index.php?error=404');
//    }
//} else {
//    session_destroy();
//    header('location:index.php?error=404');
//}

if (!empty($controle) && isset($controle)) {
    switch ($controle) {
        case 'addContato':
            include_once('addContato.php');
            break;
        case 'listarBanner':
            include_once ('listarBanner.php');
            break;
        case 'listarContato':
            include_once ('listarContato.php');
            break;
        case 'listarProduto':
            include_once ('listarProduto.php');
            break;
        case 'listarAdm':
            include_once ('listarAdm.php');
            break;
    }

} else {
    ?>
    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
        <h1>Página Vazia, Retorne. </h1><sup>Error 404</sup>
        <img src="../img/vazio.gif" alt="ERROR 404">
    </div>
    <?php
}
