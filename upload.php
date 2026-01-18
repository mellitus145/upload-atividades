<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Método não permitido");
}

if (!isset($_FILES['arquivo'])) {
    http_response_code(400);
    exit("Arquivo não enviado");
}

$pasta = "uploads/";
if (!is_dir($pasta)) {
    mkdir($pasta, 0777, true);
}

$nomeOriginal = $_FILES['arquivo']['name'];
$nomeFinal = uniqid() . "_" . $nomeOriginal;

move_uploaded_file(
    $_FILES['arquivo']['tmp_name'],
    $pasta . $nomeFinal
);

echo "Upload realizado com sucesso";
