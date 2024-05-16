<?php



include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
echo json_encode($dados);


//if (isset($dados) && !empty($dados)) {
//    $id = isset($dados['idDeleteAdm']) ? addslashes($dados['idDeleteAdm']) : '';
//
//    $retornoDelete = listarItemExpecifico('*', 'produto', 'idproduto', $id);
//    if ($retornoDelete > 0) {
//        echo json_encode(['success' => true, 'message' => "Produto encontrado com sucesso"]);
//    } else {
//        echo json_encode(['success' => false, 'message' => "Produto não encontrado!"]);
//    }
//} else {
//    echo json_encode(['success' => false, 'message' => "Produto não encontrada!"]);
//}
