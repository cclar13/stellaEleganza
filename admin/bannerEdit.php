<?php
include_once ("../config/constantes.php");
include_once ("../config/conexao.php");
include_once ("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $item1 = isset($dados['item1']) ? addslashes($dados['item1']) : '';
    $item2 = isset($dados['item2']) ? addslashes($dados['item2']) : '';
    $item3 = isset($dados['item3']) ? addslashes($dados['item3']) : '';

    if ($item1 !== 'vazio') {
        $contar = 1;
    }
    if ($item2 !== 'vazio') {
        $contar = 2;
    }
    if ($item3 !== 'vazio') {
        $contar = 3;
    }
    $num = 0;
    while ($num < $contar) {
        $num = $num + 1;

        if (isset($_FILES["imagem$num"]) && $_FILES["imagem$num"]['error'] === UPLOAD_ERR_OK) {
            $fotoTmpName = $_FILES["imagem$num"]['tmp_name'];
            $fotoName = $_FILES["imagem$num"]['name'];
            $uploadDir = '../img/banners';
            $fotoPath = uniqid() . '_' . $fotoName;
            if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
                $retornoInsert = alterar1Item('banner', "foto$num", $fotoPath, 'idbanner', '1');
            }

        }

    }

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Banner alterado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Banner não alterado!"]);
    }

}