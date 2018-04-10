<?php
    if (isset($_POST['nomeFilme'], $_POST['sinopseFilme'],  $_POST['anoFilme'], $_POST['duracaoFilme'])){
        $nomeFilme = $_POST['nomeFilme'];
        $sinopseFilme = $_POST['sinopseFilme'];
        $anoFilme = $_POST['anoFilme'];
        $duracaoFilme = $_POST['duracaoFilme'];
        include "conexao.php";
        $gravarFilme = mysqli_query($conexao,"INSERT INTO tb_filmes (titulo_filme, descricao_filme, anoLancamento_filme, duracao_filme) VALUE ('$nomeFilme','$sinopseFilme', '$anoFilme', '$duracaoFilme')") or die (header('Location:cadastro.php&cadastroFilme=ERRO?nomeFilme='.$nomeFilme.'&sinopseFilme='.$sinopseFilme.'&anoFilme='.$anoFilme.'&duracaoFilme='.$duracaoFilme));
        $idFilme=mysqli_insert_id($conexao); //Recupera a ID do último iten inserido no BD
        //Guarda as categorias na tabela de categorias
        if(isset($_POST['categoriaFilme'])){ // Verifica se alguma categoria foi escolhida
            $categoriaFilme = $_POST['categoriaFilme'];
            foreach($categoriaFilme as $key){ //Para cada valor na array de categorias será executado o código abaixo
                 $gravarCategorias = mysqli_query($conexao,"INSERT INTO tb_filmesporcategoria (id_filme, id_categoria) VALUE ('$idFilme','$key')");
            }
        }
        //Cria uma pastas para armazenar os arquivos
        $destino = './video/'.$idFilme.'/';
        if (!is_dir($destino)){
            if (!mkdir($destino, 0755, true)) {
                die('Não foi possível criar a pasta do filme.');
            }
        }
        if (isset($_FILES['uploadedFiles']['tmp_name'])){
            echo "Enviou arquivos! || ";
            //Processa cada imagem individualmente e as armazena em um diretório com o nome do código do produto
            $quantArqu = count($_FILES['uploadedFiles']['tmp_name']);
            $uploadedFiles = $_FILES["uploadedFiles"];
            for($i = 0;$i<$quantArqu; $i++){
                // check if there is a file in the array
                if(!is_uploaded_file($_FILES['uploadedFiles']['tmp_name'][$i]))
                {
                    echo "Não foi enviado nenhum arquivo!";
                } else{
                    $nomeArquivo = $uploadedFiles["name"][$i];  
                    $tipoArquivo = $uploadedFiles["type"][$i]; 
                    $nomeTemporario = $uploadedFiles["tmp_name"][$i];
                    $nomeArquivo = $destino . $nomeArquivo;
                    move_uploaded_file($nomeTemporario, $nomeArquivo);
                }
            }
        }
    header('Location:cadastro.php?cadastroFilme=OK');
    }
?>