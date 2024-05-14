<?php
include_once("../config/constantes.php");
include_once("../config/conexao.php");
include_once("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['addNomeAdm']) ? addslashes($dados['addNomeAdm']) : '';
    $email = isset($dados['addEmailAdm']) ? addslashes($dados['addEmailAdm']) : '';
    $senha = isset($dados['addSenhaAdm']) ? addslashes($dados['addSenhaAdm']) : '';

    $senhaCrip = criarSenhaHash($senha);


    if (isset($_FILES["addFotoAdm"]) && $_FILES["addFotoAdm"]['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES["addFotoAdm"]['tmp_name'];
        $fotoName = $_FILES["addFotoAdm"]['name'];
        $uploadDir = '../img/perfil';
        $fotoPath = uniqid() . '_' . $fotoName;

//        echo $fotoPath;

        if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
            $retornoInsert = insert5Item('adm', 'fotoAdm, nomeAdm, email, senha, cadastro', "$fotoPath", "$nome", "$email", "$senhaCrip", DATATIMEATUAL);
            echo json_encode(['success' => true, 'message' => "Administrador cadastrado com sucesso pettersen"]);
//            if ($retornoInsert > 0) {
//                echo json_encode(['success' => true, 'message' => "Administrador cadastrado com sucesso pettersen"]);
//            } else {
//                echo json_encode(['success' => false, 'message' => "Administrador não cadastrado LUciano!"]);
//            }
        } else {
            echo json_encode(['success' => false, 'message' => "Foto não encontrada!"]);
        }

    }

    else {
        $retornoInsert = insert4Item('adm', 'nomeAdm, email, senha, cadastro', "$nome", "$email", "$senhaCrip", DATATIMEATUAL);
        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Administrador cadastrado com sucesso alessa"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Administrador não cadastrado vanessa!"]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => "Erro, nenhum dado encontrado walter!"]);
}
