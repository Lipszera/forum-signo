<?php

if (!isset($_POST['inputDate'])) {
    echo "Data não preenchida ou inválida!";
    exit;
}

$userDate = explode('-', $_POST['inputDate']);
$month = $userDate[1];
$day = $userDate[2];
$xmlFile = simplexml_load_file('signos.xml');

$sign = "";
$signNode = null;
foreach($xmlFile as $node) {
    if ($month == "12"){
        if ($day < 22) {
            $sign = "Sagitário";
        } else {
            $sign = "Capricórnio";
        }
    } else if ($month == "01"){
        if ($day < 21) {
            $sign = "Capricórnio";
        } else {
            $sign = "Aquário";
        }
    } else if ($month == "02"){
        if ($day < 19) {
            $sign = "Aquário";
        } else {
            $sign = "Peixes";
        }
    } else if($month == "03"){
        if ($day < 21) {
            $sign = "Peixes";
        } else {
            $sign = "Áries";
        }
    } else if ($month == "04"){
        if ($day < 21) {
            $sign = "Áries";
        } else {
            $sign = "Touro";
        }
    } else if ($month == "05"){
        if ($day < 21) {
            $sign = "Touro";
        } else {
            $sign = "Gêmeos";
        }
    } else if( $month == "06"){
        if ($day < 21) {
            $sign = "Gêmeos";
        } else {
            $sign = "Câncer";
        }
    } else if ($month == "07"){
        if ($day < 23) {
            $sign = "Câncer";
        } else {
            $sign = "Leão";
        }
    } else if( $month == "08"){
        if ($day < 23) {
            $sign = "Leão";
        } else {
            $sign = "Virgem";
        }
    } else if ($month == "09"){
        if ($day < 23) {
            $sign = "Virgem";
        } else {
            $sign = "Libra";
        }
    } else if ($month == "10"){
        if ($day < 23) {
            $sign = "Libra";
        } else {
            $sign = "Escorpião";
        }
    } else if ($month == "11"){
        if ($day < 22) {
            $sign = "Escorpião";
        } else {
            $sign = "Sagitário";
        }
    }

    if ($node->signoNome == $sign) {
        $signNode = $node;
        break;
    }
}

if ($signNode === null) {
    echo "Signo não encontrado com essa data!";
    exit;
}

echo "Signo: {$signNode->signoNome} <br>";
echo "Data Início: {$signNode->dataInicio} <br>";
echo "Data Fim: {$signNode->dataFim} <br>";
echo "Descrição: {$signNode->descricao} <br>";
echo "Imagem: <br> <img src='{$signNode->imagem}' width=100 height=100> <br>";
