<?php
    include "conexao.php";
    $buscaCategorias = mysqli_query($conexao, "SELECT * FROM tb_categoria;");
    $quantResultados = mysqli_num_rows($buscaCategorias);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Página Modelo</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <!--  Meu CSS  -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- Menu -->
    <?php
        include "menu.html";
    ?>
    <!-- Listagem de categorias -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="listaCategorias">
                    <h1>
                        CATEGORIAS CADASTRADAS
                    </h1>
                    <?php 
                        for ($i=0;
                            $i < $quantResultados;
                            $i++) {
                                $categoriasResultados=mysqli_fetch_array($buscaCategorias);
                                $categoriaId= $categoriasResultados ["id_categoria"];
                                $categoriaNome= $categoriasResultados ["nome_categoria"];

                            echo'
                                <div class="btn-group" id="'.$categoriaId.'">
                                    <button type="button" class="btn btn-info" disabled>'.$categoriaNome.'</button>
                                    <button type="button" idCategoria="'.$categoriaId.'" class="btn btn-danger deletarCategoria"><i class="fas fa-trash-alt"></i></button>
                                </div>';
                        }
                        ?>
                    <div class="btn-group novaCategoria">
                        <span contenteditable="true" class="btn btn-default" id="novaCategoria">Nova categoria</span>
                        <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
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
                            <li><a href=""><i class="fas fa-file"></i> News</a></li>
                            <li><a href=""><i class="fas fa-android"></i> Android</a></li>
                            <li><a href=""><i class="fas fa-code"></i> C#</a></li>
                            <li><a href=""><i class="fas fa-code"></i> Java</a></li>
                            <li><a href=""><i class="fas fa-book"></i> Books</a></li>
                            <li><a href=""><i class="fas fa-globe"></i> Web</a></li>
                            <li><a href=""><i class="fas fa-windows"></i> Windows</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3>Contact:</h3>
                        <p>Have a question or feedback? Contact me!</p>
                        <p><a href="" title="Contact me!"><i class="fas fa-envelope"></i> Contact</a></p>
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
                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));

                    </script>
                    <div class="fb-like" data-href="" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="">Tweet</a>
                    <script>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0],
                                p = /^http:/.test(d.location) ? 'http' : 'https';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + '://platform.twitter.com/widgets.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'twitter-wjs');
                    </script>
                    <div class="g-plusone" data-annotation="inline" data-width="300" data-href=""></div>
                    <!-- Helyezd el ezt a címkét az utolsó +1 gomb címke mögé. -->
                    <script type="text/javascript">
                        (function() {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                    <br/>
                    <hr>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <p>Copyright © Your Website | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
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
