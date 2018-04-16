<?php
if (isset($_POST['nomeFilme'], $_POST['sinopseFilme'], $_POST['anoFilme'], $_POST['duracaoFilme'])) {
    $nomeFilme    = $_POST['nomeFilme'];
    $sinopseFilme = $_POST['sinopseFilme'];
    $anoFilme     = $_POST['anoFilme'];
    $duracaoFilme = $_POST['duracaoFilme'];
    include "conexao.php";
    $gravarFilme = mysqli_query($conexao, "INSERT INTO tb_filmes (titulo_filme, descricao_filme, ano_filme, duracao_filme) VALUE ('$nomeFilme','$sinopseFilme', '$anoFilme', '$duracaoFilme')") or die(header('Location:cadastro.php?cadastroFilme=ERRO&nomeFilme=' . $nomeFilme . '&sinopseFilme=' . $sinopseFilme . '&anoFilme=' . $anoFilme . '&duracaoFilme=' . $duracaoFilme));
    $idFilme = mysqli_insert_id($conexao); //Recupera a ID do último iten inserido no BD
    //Guarda as categorias na tabela de categorias
    if (isset($_POST['categoriaFilme'])) { // Verifica se alguma categoria foi escolhida
        $categoriaFilme = $_POST['categoriaFilme'];
        foreach ($categoriaFilme as $key) { //Para cada valor na array de categorias será executado o código abaixo
            $gravarCategorias = mysqli_query($conexao, "INSERT INTO tb_filmesporcategoria (id_filme, id_categoria) VALUE ('$idFilme','$key')");
        }
    }
     //Cria uma pastas para armazenar os arquivos
        $destino = './video/'.$idFilme.'/';
        if (!is_dir($destino)){
            if (!mkdir($destino, 0755, true)) {
                die(header('Location:cadastro.php?cadastroFilme=ERROPASTA'));
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
    <!DOCTYPE html>
    <html>
    <head>
        <title>Página Modelo</title>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <!--  Meu CSS  -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <?php
        include "menu.html";
    ?>
    <!--  Formulário de cadastro  -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php
                if (isset($_GET['cadastroFilme'])){
                    $cadastroFilme=$_GET['cadastroFilme'];
                    if($cadastroFilme == "OK"){
                    echo '<div class="alert alert-success text-center">Filme cadastrado feito com sucesso!</div>'; 
                }
                    else{
                    echo '<div class="alert alert-danger text-center">Erro ao cadastrar filme! Tente novamente!</div>';        
                    }
                }
                ?>
                <form class="cadastroFilmes form-horizontal" method="post" action="cadastro.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>CADASTRO DE FILME</legend>
                        <div class="form-group">
                            <label for="nomeFilme" class="control-label col-sm-2">Nome do filme</label>
                            <div class=" col-md-10">
                                <input type="text" class="form-control" id="nomeFilme" name="nomeFilme" placeholder="Digite aqui o nome do filme" required="" value="<?php if (isset($_GET['nomeFilme'])){echo $_GET['nomeFilme'];}?>">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="duracaoFilme" class="control-label col-sm-2">Duração</label>
                            <div class=" col-md-10">
                                <input type="number" class="form-control" id="duracaoFilme" name="duracaoFilme" placeholder="Digite aqui a duração do filme" required="" value="<?php if (isset($_GET['duracaoFilme'])){echo $_GET['duracaoFilme'];}?>">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="anoFilme" class="control-label col-sm-2">Ano de lançamento</label>
                            <div class=" col-md-10">
                                <input type="number" class="form-control" id="anoFilme" name="anoFilme" placeholder="Digite o ano de lançamento do filme" required="" value="<?php if (isset($_GET['anoFilme'])){echo $_GET['anoFilme'];}?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sinopseFilme">Descrição</label>
                            <div class=" col-md-10">
                                <textarea class="form-control" id="sinopseFilme" name="sinopseFilme" name="sinopseFilme" rows="4" maxlength="280"><?php if (isset($_GET['sinopseFilme'])){echo $_GET['sinopseFilme'];} else{ echo 'Digite aqui a sinopse do filme.';}?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaFilme" class="control-label col-sm-2">CATEGORIA</label>
                            <div class=" col-sm-10">
                                <?php
                                    //Trecho reponsável por recuperar as informações das categorias já cadastradas no sistema.
                                    include "conexao.php";
                                    $buscaCategorias = mysqli_query($conexao, "SELECT * FROM tb_categoria;");
                                    $quantidadeCategorias = mysqli_num_rows($buscaCategorias);
                                    for ($i=0;
                                        $i < $quantidadeCategorias;
                                        $i++) {
                                            $categoriasResultados=mysqli_fetch_array($buscaCategorias);
                                            $categoriaId= $categoriasResultados ["id_categoria"];
                                            $categoriaNome= $categoriasResultados ["nome_categoria"];
                                        echo'
                                            <div class="checkbox">
                                                <label class="checkbox-inline" data-initialize="checkbox">
                                                    <input class="checkBoxCat" name="categoriaFilme[]" type="checkbox" value="'.$categoriaId.'">
                                                    <span class="checkbox-label">'.$categoriaNome.'</span>
                                                </label>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="arquivoFilme" class="control-label col-sm-2"></label>
                            <div class=" col-md-10">
                                <input type="file" id="arquivoFilme" name="uploadedFiles[]" multiple class="btn botao">
                                <p class="help-block">Selecione o arquivo de vídeo</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="capaFilme" class="control-label col-sm-2"></label>
                            <div class=" col-md-10">
                                <input type="file" id="capaFilme" name="uploadedFiles[]" multiple class="btn botao">
                                <p class="help-block">Selecione a capa do filme</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="text-right col-md-10">
                                <div id="enviarGroup" class="btn-group" role="group" aria-label="">
                                    <button type="submit" id="enviar" name="enviar" class="btn botao" aria-label="Enviar">Enviar</button>
                                    <button type="button" id="cancelar" name="cancelar" class="btn botao" aria-label="Enviar">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
            <!--  Rodapé  -->
            <footer>
                <div class="row">
                    <div class="col-md-12 col-md-12 col-sm-12">
                        <div class="container-fluid">
                            <div class="col-lg-3">
                                <div class="cuadro_intro_hover " style="background-color:#cccccc;">
                                    <p style="text-align:center; margin-top:20px;">
                                        <img src="http://placehold.it/500x330" class="img-responsive" alt="">
                                    </p>
                                    <div class="caption">
                                        <div class="blur"></div>
                                        <div class="caption-text">
                                            <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">THIS IS H3</h3>
                                            <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                                            <a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="cuadro_intro_hover " style="background-color:#cccccc;">
                                    <p style="text-align:center; margin-top:20px;">
                                        <img src="http://placehold.it/500x330" class="img-responsive" alt="">
                                    </p>
                                    <div class="caption">
                                        <div class="blur"></div>
                                        <div class="caption-text">
                                            <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">THIS IS H3</h3>
                                            <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                                            <a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h3>Categories:</h3>
                                <ul>
                                    <li><a href=""><i class="fas fa-file"></i> News</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-android"></i> Android</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-code"></i> C#</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-code"></i> Java</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-book"></i> Books</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-globe"></i> Web</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-windows"></i> Windows</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h3>Contact:</h3>
                                <p>Have a question or feedback? Contact me!</p>
                                <p><a href="" title="Contact me!"><i class="fas fa-envelope"></i> Contact</a>
                                </p>
                                <h3>Follow:</h3>
                                <a href="" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg">
                            <i class="fas fa-square-o fa-stack-2x"></i>
                            <i class="fas fa-twitter fa-stack-1x"></i>
                            </span>
                            Twitter</a>
                                <a href="" target="_blank" title="GitHub"><span class="fa-stack fa-lg">
                            <i class="fas fa-square-o fa-stack-2x"></i>
                            <i class="fas fa-github fa-stack-1x"></i>
                            </span>
                            GitHub</a>
                            </div>
                            <br/>
                            <div id="fb-root"></div>
                            <br/>
                            <hr>
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <p>Copyright © Your Website | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Jquery Js 2.24 -->
            <script src="js/jquery.min.js"></script>
            <!-- Bootstrap Js -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- Modernizr -->
            <script src="js/modernizr.custom.js"></script>
            <!-- Js personalizado -->
            <script src="js/script.js"></script>
    </body>

    </html>
