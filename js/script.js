/*
========================================
Página principal
========================================
*/

// Setup do Plyr Plugin - Player dos filmes. Saiba mais sobre em: https://plyr.io/
$(document).ready(function () {
    $(".setaVoltar i").click(function () {
        $(".videoContainer").empty();
        $(".videoPlayer").hide();
        players[0].stop();
        players[0].destroy();
    });
    $(".botaoPlay").click(function () {
        var videoAtual = $(this).attr("videoAtual");;
        var videoContent = '<video controls class="telaPlayer"><source src="' + videoAtual + '" type="video/mp4"></video>';
        $(".videoContainer").html(videoContent);
        $(".videoPlayer").show();
        var players = plyr.setup('.telaPlayer');
        players[0].play();
    });
});

//Limita a quantidade de texto exibida na sinopse dos filmes na tela principal

$(document).ready(function () {
    $(".sinopseFilme").each(function () {
        var $limiteTexto = 250;
        if ($(this).text().length >= $limiteTexto) {
            $novaSinopse = $(this).text().substr(0, $limiteTexto);
            $(this).text($novaSinopse + "...");
        }
    });
});
/*
========================================
Página de gestão de cadastro de filmes
========================================
*/

// Remove o texto da sinopse do filme no formulário de cadastro de filmes
$("#sinopseFilme").focusin(function () {
    if ($("#sinopseFilme").val() == "Digite aqui a sinopse do filme.") {
        $("#sinopseFilme").val("");
    }
})

/*
========================================
Página de gestão de listagem de filmes
========================================
*/

//Exclui filmes da listagem de filmes
$('.delFilme').click(function () {
    var $botaoClicado = $(this).find('.fa');
    var $caixaFilme = $(this);
    var $idFilme = $(this).attr('idFilme');
    // AJAX request
    $.ajax({
        url: 'excluirFilme.php',
        type: 'post',
        dataType: "json",
        data: {
            idFilme: $idFilme
        },
        beforeSend: function () {
            // setting a timeout
            $botaoClicado.removeClass("fa-trash-o").addClass("fa-spinner fa-spin");
        },
        success: function (response) {
            // Resposta
            if (response == 1) {
                setTimeout(function () {
                    $caixaFilme.removeClass("btn-danger").addClass("btn-success");
                    $botaoClicado.removeClass("fa-spinner fa-spin").addClass("fa-check-circle");
                }, 1000);
                setTimeout(function () {
                    $("#" + $idFilme).fadeOut(500, function () {
                        $("#" + $idFilme).remove();
                    });
                }, 1000);
            }
        }
    });
});

/*
========================================
Página de gestão de categorias
========================================
*/

//Permite excluir as categorias de filmes já cadastradas da página de de Categorias
$(document).ready(function () {
    //Pega os valores
    $(".listaCategorias").on('click', '.deletarCategoria', function(){
        var $iconeDoBotao = $(this).find('.fas');
        var $botaoClicado = $(this);
        var $codCategoria = $(this).attr('idCategoria');
        // AJAX request
        $.ajax({
            url: 'removerCategorias.php',
            type: 'post',
            dataType: "json",
            data: {
                codCategoria: $codCategoria
            },
            beforeSend: function () {
                // setting a timeout
                $iconeDoBotao.removeClass("fa-trash-alt").addClass("fas fa-cog fa-spin");
            },
            success: function (response) {
                // Resposta
                if (response == 1) {
                    setTimeout(function () {
                        $botaoClicado.removeClass("btn-danger").addClass("btn-success");
                        $iconeDoBotao.removeClass("fas fa-cog fa-spin").addClass("fas fa-check");
                        $botaoClicado.parent().fadeOut("slow").remove();
                    }, 1000);
                }
            }
        });
    });
});
//Remove texto do formulário de criação de novas categorias na página de gestão de categorias
$("#novaCategoria").click(function () {
    if ($("#novaCategoria").text() == "Nova categoria") {
         $("#novaCategoria").empty();
    }
});
//Testa de a categoria sendo cadastrada já existe
$("#novaCategoria").focusout(function () {
    var quantidadeCategorias = $(".nomeCategoria").length;
    for(i = 0; i < quantidadeCategorias; i++) { 
         if ($(".nomeCategoria").eq(i).text().toLocaleLowerCase() == $("#novaCategoria").text().toLocaleLowerCase()){
            alert ("Esta categoria já existe");
            $("#novaCategoria").empty();
        }
    }
    $(".nomeCategoria").each(function(){
        
   })
});
$("#novaCategoria").focusout(function () {
    if ($("#novaCategoria").text() == "") {
        $("#novaCategoria").text("Nova categoria");
    }
});

//Permite criar categorias novas para os filmes
$(document).ready(function () {
    //Pega os valores
    $('.criarCategoria').click(function () {
        var $iconeBotao = $(this).find('.fas');
        var $botaoClicado = $(this);
        var $nomeCategoria = $("#novaCategoria").text();
        // AJAX request
        $.ajax({
            url: 'adicionarCategorias.php',
            type: 'post',
            dataType: "json",
            data: {
                nomeCategoria: $nomeCategoria
            },
            beforeSend: function () {
                // Atraso de 1 seg para que tudo não aconteça tão derrepente
                $iconeBotao.removeClass("fas fa-plus").addClass("fas fa-cog fa-spin");
            },
            success: function (response) {
                // Resposta
                if (response != 0) {
                    //Muda ícone para 
                    setTimeout(function () {
                    $iconeBotao.removeClass("fas fa-cog fa-spin").addClass("fas fa-check");
                    }, 1000);
                    //Adiciona o novo botão com a nova categoria antes do botão de criação de nova categoria.
                    $('<div class="btn-group nomeCategoria" id=""><button type="button" class="btn btn-info" disabled>'+$nomeCategoria+'</button><button type="button" idCategoria="'+response+'" class="btn btn-danger deletarCategoria"><i class="fas fa-trash-alt"></i></button></div>').prependTo(".listaCategorias").hide().fadeIn("slow");
                    setTimeout(function () {
                    $iconeBotao.removeClass("fas fa-check").addClass("fas fa-plus");
                    $("#novaCategoria").text("Nova categoria").fadeIn("slow");
                    }, 2000);
                }
            }
        });
    });
});