<?php
include 'conexaobd_php.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Previne SQL Injection ao buscar dados
    $sql = mysqli_prepare($conexaoBD, "SELECT * FROM usuario WHERE id = ?");
    mysqli_stmt_bind_param($sql, "i", $id);
    mysqli_stmt_execute($sql);
    $resultado = mysqli_stmt_get_result($sql);
    $usuario = mysqli_fetch_assoc($resultado);

    $nome = $usuario['nome'];
    $sobrenome = $usuario['sobrenome'];
    $nivel = $usuario['nivel'];
    mysqli_stmt_close($sql);
}

if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nivel = $_POST['nivel'];

    // Prepara a consulta de atualização
    $query = "UPDATE usuario SET nome = ?, sobrenome = ?, nivel = ? WHERE id = ?";
    
    if ($stmt = mysqli_prepare($conexaoBD, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $nome, $sobrenome, $nivel, $id);

        if (mysqli_stmt_execute($stmt)) {
            header('location: tabela.php');
        } else {
            echo "Erro ao atualizar os dados: " . mysqli_error($conexaoBD);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conexaoBD);
    }
}
?>
