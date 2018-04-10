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
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-hover table-condensed table-responsive">
                    <tr>
                        <th>ID FILME</th>
                        <th>TÍTULO FILME</th>
                        <th>EDITAR</th>
                        <th>EXCLUIR</th>
                    </tr>
                    <!--  Galeria de filmes  -->
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

                            echo'
                            <tr id="'.$filmeId.'"><td>'.$filmeId.'</td><td>'.$filmetitulo.'</td><td><a href="editarFilme.php?idFilme='.$filmeId.'"><span class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></td><td><a href="#" idFilme="'.$filmeId.'" class="btn btn-danger delFilme"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        }
                        ?>
                </table>
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
