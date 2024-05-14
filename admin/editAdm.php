<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditAdm']) ? addslashes($dados['idEditAdm']) : '';
    $nome = isset($dados['editNomeAdm']) ? addslashes($dados['editNomeAdm']) : '';
    $email = isset($dados['editEmailAdm']) ? addslashes($dados['editEmailAdm']) : '';
    $senha = isset($dados['editSenhaAdm']) ? addslashes($dados['editSenhaAdm']) : '';

    $senhaCrip = criarSenhaHash($senha);

    if (isset($_FILES["editFotoAdm"]) && $_FILES["editFotoAdm"]['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES["editFotoAdm"]['tmp_name'];
        $fotoName = $_FILES["editFotoAdm"]['name'];
        $uploadDir = '../img/perfil';
        $fotoPath = uniqid() . '_' . $fotoName;

        if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
            $retornoUpdate = alterar4Item('adm', 'fotoAdm', 'nomeAdm', 'email', 'senha', "$fotoPath", "$nome", "$email", "$senhaCrip", 'idadm',"$id");
            if ($retornoUpdate > 0) {
                echo json_encode(['success' => true, 'message' => "Administrador alterado com sucesso"]);
            } else {
                echo json_encode(['success' => false, 'message' => "Administrador não alterado!"]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => "Foto não encontrada!"]);
        }

    } else {
        $retornoUpdate = alterar3Item('adm', 'nomeAdm', 'email', 'senha', "$nome", "$email", "$senhaCrip", 'idadm',"$id");
        if ($retornoUpdate > 0) {
            echo json_encode(['success' => true, 'message' => "Administrador alterado com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Administrador não alterado!"]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => "Erro, nenhum dado encontrado!"]);
}
