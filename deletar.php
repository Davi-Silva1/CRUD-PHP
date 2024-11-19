<?php
include 'conexaobd_php.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta de exclusão
    $query = "DELETE FROM usuario WHERE id = ?";

    if ($stmt = mysqli_prepare($conexaoBD, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id); 

        if (mysqli_stmt_execute($stmt)) {
            header('location: index.php');
        } else {
            echo "Erro ao excluir o usuário: " . mysqli_error($conexaoBD);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conexaoBD);
    }
}
?>
