// Setup do Plyr Plugin 
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

// Remove o texto da sinopse do filme no formulário de cadastro de filmes
$("#sinopseFilme").focusin(function () {
    if ($("#sinopseFilme").val() == "Digite aqui a sinopse do filme.") {
        $("#sinopseFilme").val("");
    }
})
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
document.addEventListener("DOMContentLoaded", function(event) {
//        var conteudo = $(".title").text();
//        if (conteudo == "MOST VIEWED") {
//            conteudo.text("MAIS PROCURADOS");
//        } else if (conteudo == "BEST SELLER") {
//            conteudo.text("MAIS VENDIDOS");
//        }
});
