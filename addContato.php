<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

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


$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://getitsms-whatsapp-apis.p.rapidapi.com/45?your_number=919876543210&your_message=your%20message",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([

    ]),
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: getitsms-whatsapp-apis.p.rapidapi.com",
        "X-RapidAPI-Key: aaccca19d7mshdd04b4ab82c4fecp16fe7ejsn28e218e018cb",
        "content-type: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
