<?php 
    include "conexao.php";
    $buscaFilmes = mysqli_query($conexao, "SELECT * FROM tb_filmes;");
    $quantResultados = mysqli_num_rows($buscaFilmes);
?>
    <!--  Video player  -->
    <div class="container-fluid videoPlayer">
        <div class="row">
            <div class="col-md-1 setaVoltar">
                <i class="fas fa-chevron-circle-left" aria-hidden="true"></i>
            </div>
            <div class="col-md-10 col-md-offset-1 videoContainer">
            </div>
        </div>
    </div>
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
    </ul>
