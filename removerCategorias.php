<?php
    //Este código é responsável por excluir uma determinada categoria de filmes.
    //Este código é chamado por uma função AJAX no arquivo script.js.
    include "conexao.php";
    $resultado = 0;
    if(isset($_POST['codCategoria'])) {
        $codCategoria = $_POST['codCategoria'];
        //Exclui as relações de filmes já cadastrados com uma determinada categoria
        mysqli_query($conexao,"DELETE FROM tb_filmesporcategoria WHERE id_categoria = '$codCategoria'");
        //Exclui a categoria
        mysqli_query($conexao,"DELETE FROM tb_categoria WHERE id_categoria = '$codCategoria'");
        $resultado = 1;
         // Return status
        echo $resultado;
    }
?>
