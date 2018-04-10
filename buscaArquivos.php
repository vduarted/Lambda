<?php
    //Busca os arquivos do filme:
    $dir = 'video/1006/';
    $arquivos = scandir ($dir);
    if(array_key_exists(2, $arquivos)){
    $arquivoAtual = $dir . $arquivos[2];
    $ext = pathinfo($arquivoAtual, PATHINFO_EXTENSION);
        if(@is_array(getimagesize($arquivoAtual))){
        echo $arquivoAtual;
        echo "<br> O arquivo é uma imagem!<br>";
        $imgAtual = $arquivoAtual;
        $videoAtual = $dir . $arquivos[3];
        echo $videoAtual;
        } else{
            $videoAtual = $dir . $arquivos[2];
            $imgAtual= $dir . $arquivos[3];
            echo $videoAtual."<br>".$imgAtual;
        }
    }
    else{
    $imgAtual = "img/placeholder.png";
    $videoAtual = "img/placeholder.mp4"
    }
?>