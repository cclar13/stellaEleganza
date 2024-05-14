<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['nomeProdutoEdit']) ? addslashes($dados['nomeProdutoEdit']) : '';
    $cor = isset($dados['corProdutoEdit']) ? addslashes($dados['corProdutoEdit']) : '';
    $sexo = isset($dados['sexoProdutoEdit']) ? addslashes($dados['sexoProdutoEdit']) : '';
    $tam = isset($dados['tamanhoProdutoEdit']) ? addslashes($dados['tamanhoProdutoEdit']) : '';
    $valor = isset($dados['valorProdutoEdit']) ? addslashes($dados['valorProdutoEdit']) : '';
    $tipo = isset($dados['tipoProdutoEdit']) ? addslashes($dados['tipoProdutoEdit']) : '';


    if (isset($_FILES["fotoProdutoEdit"]) && $_FILES["fotoProdutoEdit"]['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES["fotoProdutoEdit"]['tmp_name'];
        $fotoName = $_FILES["fotoProdutoEdit"]['name'];
if($sexo ==1){

        $uploadDir = '../img/roupas/feminino';
}else{
        $uploadDir = '../img/roupas/masculino';
}

        $fotoPath = uniqid() . '_' . $fotoName;

        if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
            $retornoInsert = insert9Item('produto', 'idsexo, nomeProduto, tipo, nomeFoto, valor, marca, cor, tamanho,cadastro', "$sexo", "$nome", "$tipo", "$fotoPath", "$valor",'stellaEleganza',"$cor","$tam",DATATIMEATUAL);
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
