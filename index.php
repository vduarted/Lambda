<?php 
    include "conexao.php";
    $buscaFilmes = mysqli_query($conexao, "SELECT * FROM tb_filmes;");
    $quantResultados = mysqli_num_rows($buscaFilmes);
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
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Plyr CSS -->
    <link rel="stylesheet" type="text/css" href="css/plyr.css">
    <!--  Meu CSS  -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!--  Video player  -->
    <div class="container-fluid videoPlayer">
        <div class="row">
            <div class="col-md-1 setaVoltar">
                <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            </div>
            <div class="col-md-10 col-md-offset-1 videoContainer">
            </div>
        </div>
    </div>
    <?php
        include "menu.html";
    ?>
    <!-- Barra de pesquisa -->
    <div class="container barraPesquisa">
        <div class="row">
            <div id="custom-search-input">
                <div class="input-group col-md-10 col-md-offset-1">
                    <input type="text" class="orangeInput search-query form-control" placeholder="Buscar filmes" />
                    <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!--  Galeria de filmes  -->
    <ul class="grid cs-style-4">
        <?php 
        for ($i=0;
            $i < $quantResultados;
            $i++) {
                $filmeslResultados=mysqli_fetch_array($buscaFilmes);
                $filmeId= $filmeslResultados ["id_filme"];
                $filmetitulo= $filmeslResultados ["titulo_filme"];
                $filmeDescricao= $filmeslResultados ["descricao_filme"];
                $filmeAno= $filmeslResultados ["ano_filme"];
                $filmeDuracao= $filmeslResultados ["duracao_filme"];
            
                //Busca os arquivos do filme:
                $dir = 'video/'.$filmeId.'/';
                $arquivos = scandir ($dir);
                if(array_key_exists(2, $arquivos)){
                $arquivoAtual = $dir . $arquivos[2];
                //$ext = pathinfo($arquivoAtual, PATHINFO_EXTENSION);
                    if(@is_array(getimagesize($arquivoAtual))){
                    $imgAtual = $arquivoAtual;
                    $videoAtual = $dir . $arquivos[3];
                    } else{
                        $videoAtual = $dir . $arquivos[2];
                        $imgAtual= $dir . $arquivos[3];
                    }
                }
                else{
                $imgAtual = "img/placeholder.png";
                $videoAtual = "img/placeholder.mp4";
                }

            echo
            '<li>
                <figure>
                    <div><img src="'.$imgAtual.'" alt="img05"></div>
                    <figcaption>
                        <h3>'.$filmetitulo.'</h3>
                        <span>'.$filmeAno.' | '.$filmeAno.'</span>
                        <br>
                        <br>
                        <p>'.$filmeDescricao.'</p>
                        <div class="AddFavorito explode"><span class="glyphicon glyphicon-heart"></span></div>
                        <a href="#" class="botao botaoPlay" videoAtual="'.$videoAtual.'"><span class="glyphicon glyphicon-play"></span> Assistir</a>
                    </figcaption>
                </figure>
            </li>';
        }
        ?>
        <!-- <li>
            <figure>
                <div><img src="img/covers/exemplo_2.jpg" alt="img05"></div>
                <figcaption>
                    <h3>The Howling</h3>
                    <span>Terror</span>
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="AddFavorito explode"><span class="glyphicon glyphicon-heart"></span></div>
                    <a href="#" class="botao botaoPlay"><span class="glyphicon glyphicon-play"></span> Assistir</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/covers/exemplo_3.jpg" alt="img05"></div>
                <figcaption>
                    <h3>The Howling</h3>
                    <span>Terror</span>
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="AddFavorito explode"><span class="glyphicon glyphicon-heart"></span></div>
                    <a href="#" class="botao botaoPlay"><span class="glyphicon glyphicon-play"></span> Assistir</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/covers/exemplo_4.jpg" alt="img05"></div>
                <figcaption>
                    <h3>The Howling</h3>
                    <span>Terror</span>
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="AddFavorito explode"><span class="glyphicon glyphicon-heart"></span></div>
                    <a href="#" class="botao botaoPlay"><span class="glyphicon glyphicon-play"></span> Assistir</a>
                </figcaption>
            </figure>
        </li> -->
    </ul>
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
                        <h3 class="footerTitle">CATEGORIAS</h3>
                        <section class="color-11">
                            <nav class="spectroEffect">
                                <a href="#" data-hover="Terror">Terror</a>
                                <a href="#" data-hover="Drama">Drama</a>
                                <a href="#" data-hover="Comedy">Comedy</a>
                                <a href="#" data-hover="Action">Action</a>
                                <a href="#" data-hover="Sci-Fi">Sci-Fi</a>
                            </nav>
                        </section>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    </div>
                    <div class="col-md-12 text-center copyright">
                        <p>Copyright © Your Website | <a href="" data-hover="Privacy Policy">Privacy Policy</a> | <a href="" data-hover="Terms of Use">Terms of Use</a></p>
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
    <!-- Plyr Js -->
    <script src="js/plyr.js"></script>
    <!-- Js personalizado -->
    <script src="js/script.js"></script>
</body>

</html>
