<?php
    //Este código é responsável por adicionar uma determinada categoria de filmes.
    //Este código é chamado por uma função AJAX no arquivo script.js.
    include "conexao.php";
    $resultado = 1;
    if(isset($_POST['nomeCategoria'])) {
        $nomeCategoria = $_POST['nomeCategoria'];
        //Inclui a nova categoria na tabela de categorias
        $gravaCategoria = mysqli_query($conexao,"INSERT INTO tb_categoria (nome_categoria)VALUE('$nomeCategoria')");
        $idCategoria=mysqli_insert_id($conexao); //Recupera a ID do último iten inserido no BD
        $resultado = $idCategoria;
    }
    echo $resultado;
?>
