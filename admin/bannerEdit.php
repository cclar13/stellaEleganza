<?php
include_once ("../config/constantes.php");
include_once ("../config/conexao.php");
include_once ("../func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);


if (isset($dados) && !empty($dados)) {

    $num = 0;
    while ($num < 4) {
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