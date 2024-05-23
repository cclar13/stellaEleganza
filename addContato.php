<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//    echo json_encode($Dados);

if (isset($Dados) && !empty($Dados)) {

    $nome = isset($Dados['nome']) ? addslashes($Dados['nome']) : '';
    $telefone = isset($Dados['telefone']) ? addslashes($Dados['telefone']) : '';


    $retornoInsert = insert3Item('contato', 'nomeContato,telefone,cadastro', $nome, $telefone, DATATIMEATUAL);

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Olá $nome, aguarde nosso contato."], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Contato Não cadastrado! Error Bd."], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Contato Não cadastrado! Error Variável."], JSON_THROW_ON_ERROR);
}
