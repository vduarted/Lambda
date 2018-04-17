<?php
    include "conexao.php";
    $filmeId = 1017;
    $buscaCategorias = mysqli_query($conexao, "SELECT * FROM tb_categoria JOIN tb_filmesporcategoria ON tb_filmesporcategoria.id_categoria = tb_categoria.id_categoria WHERE id_filme = $filmeId;");
    $quantCategorias = mysqli_num_rows($buscaCategorias);
    $categoriasFilme = array();
    for ($i=0;
    $i < $quantCategorias;
    $i++) {
        $categoriaslResultados=mysqli_fetch_array($buscaCategorias);
        $categoriasFilme[$i] = $categoriaslResultados ["nome_categoria"];
    }
    $categoriasFilme=implode(", ",$categoriasFilme);
    echo $categoriasFilme;
?>