<?php
include 'conexaobd_php.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados de forma segura
    $nome = mysqli_real_escape_string($conexaoBD, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conexaoBD, $_POST['sobrenome']);
    $nivel = mysqli_real_escape_string($conexaoBD, $_POST['nivel']);

    $query = "INSERT INTO usuario (nome, sobrenome, nivel) VALUES (?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conexaoBD, $query)) {
        mysqli_stmt_bind_param($stmt, "sss", $nome, $sobrenome, $nivel);

        if (mysqli_stmt_execute($stmt)) {
            header('location: index.php');
        } else {
            echo "Erro ao salvar os dados: " . mysqli_error($conexaoBD);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conexaoBD);
    }
}
?>
