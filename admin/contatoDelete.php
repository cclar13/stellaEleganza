<?php
include_once ("../config/constantes.php");
include_once ("../config/conexao.php");
include_once ("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeletarContato']) ? addslashes($dados['idDeletarContato']) : '';
    $retornoInsert = deletarCadastro('contato','idcontato',$id);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Contato deletado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Contato não deletado!"]);
    }


}else{
    echo json_encode(['success' => false, 'message' => "Erro DB não cadastrado!"]);
}