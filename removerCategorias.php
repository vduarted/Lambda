<?php
    include "conexao.php";
    $resultado = 0;
    if(isset($_POST['codCategoria'])) {
        $codCategoria = $_POST['codCategoria'];
        mysqli_query($conexao,"DELETE FROM tb_filmesporcategoria WHERE id_categoria = '$codCategoria'");
        mysqli_query($conexao,"DELETE FROM tb_categoria WHERE id_categoria = '$codCategoria'");
        $resultado = 1;
         // Return status
        echo $resultado;
    }
?>
