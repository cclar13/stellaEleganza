<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");

if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    $fotoAdm = $_SESSION['fotoAdm'];
} else {
    session_destroy();
    header('location: index.php?error=404');
}


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['nomeProdutoAdd']) ? addslashes($dados['nomeProdutoAdd']) : '';
    $cor = isset($dados['corProdutoAdd']) ? addslashes($dados['corProdutoAdd']) : '';
    $sexo = isset($dados['sexoProdutoAdd']) ? addslashes($dados['sexoProdutoAdd']) : '';
    $tam = isset($dados['tamanhoProdutoAdd']) ? addslashes($dados['tamanhoProdutoAdd']) : '';
    $valor = isset($dados['valorProdutoAdd']) ? addslashes($dados['valorProdutoAdd']) : '';
    $tipo = isset($dados['tipoProdutoAdd']) ? addslashes($dados['tipoProdutoAdd']) : '';
    $telainicial = isset($dados['telaInicialProdutoAdd']) ? addslashes($dados['telaInicialProdutoAdd']) : '';
    $posicao = isset($dados['posicaoProdutoAdd']) ? addslashes($dados['posicaoProdutoAdd']) : '';


    if (isset($_FILES["fotoProdutoAdd"]) && $_FILES["fotoProdutoAdd"]['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES["fotoProdutoAdd"]['tmp_name'];
        $fotoName = $_FILES["fotoProdutoAdd"]['name'];
        if ($sexo == 1) {

            $uploadDir = '../img/roupas/feminino';
        } else {
            $uploadDir = '../img/roupas/masculino';
        }

        $fotoPath = uniqid() . '_' . $fotoName;

        if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
            $retornoInsert = insert11Item('produto', 'idsexo, nomeProduto, tipo, nomeFoto, valor, marca, cor, tamanho,telainicial,posicao,cadastro', "$sexo", "$nome", "$tipo", "$fotoPath", "$valor", 'stellaEleganza', "$cor", "$tam","$telainicial","$posicao", DATATIMEATUAL);
            if ($retornoInsert > 0) {
                echo json_encode(['success' => true, 'message' => "Produto cadastrado com sucesso"]);
            } else {
                echo json_encode(['success' => false, 'message' => "Produto não cadastrado!"]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => "Foto não encontrada!"]);
        }

    }
} else {
    echo json_encode(['success' => false, 'message' => "Erro, nenhum dado encontrado!"]);
}
