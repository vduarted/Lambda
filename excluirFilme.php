<?php
    include "conexao.php";
	$idFilme = $_POST["idFilme"];
    $dir = './video/'.$idFilme;
    $output = 0;
    $buscaCategoria = mysqli_query($conexao, "SELECT tb_filmesporcategoria.* FROM tb_filmesporcategoria WHERE id_filme = '$idFilme'") or die("Erro ao encontrar categorias de filme.");;
    $quantCategoria = mysqli_num_rows($buscaCategoria);
    if($quantCategoria >= 1){
        $deletaCategoria = mysqli_query($conexao, "DELETE tb_filmesporcategoria.* FROM tb_filmesporcategoria WHERE id_filme = '$idFilme'") or die("Erro ao excluir categorias de filme.");
        $deletaFilme = mysqli_query($conexao, "DELETE tb_filmes.* FROM tb_filmes WHERE tb_filmes.id_filme ='$idFilme'") or die("Erro ao excluir filme.");
        $output = 1;
    }else{
        $deletaFilme = mysqli_query($conexao, "DELETE tb_filmes.* FROM tb_filmes WHERE id_filme = '$idFilme'") or die("Erro ao excluir filme.");
        $output = 1;
    }
    // Excluir arquivos
     if (is_dir($dir)){
        $arquivos = scandir ($dir);
        foreach($arquivos as $key){
            if(!($key == "." or $key == "..")){
            unlink($dir."/".$key);
            }
        }
        rmdir($dir);
     }
    echo $output;
?>
