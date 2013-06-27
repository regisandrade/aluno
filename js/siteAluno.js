function alertaDialog(resposta,param){
    if(resposta && resposta.sucesso == true){
        $(param.idDiv).html('<p><span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>'+resposta.mensagem+'</p>');
    }else{
        $(param.idDiv).html('<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>'+resposta.mensagem+'</p>');
    }
    // Dialog
    $(param.idDiv).dialog({
        resizable: false,
        width: param.largura,
        height: param.altura,
        title: param.titulo,
        modal: true,
        buttons: {
            Ok: function() {
                $(this).dialog( "close" );
            }
        }
    });
}

$(document).ready(function() {

    $('.ver-aviso').hide();

    /* Gravra depoimento do aluno */
    $('#gravarDepoimento').click(function(){

        $('body').append('<div id="dialog-message"></div>');

        var form = $('form[name=formDepoimento]');
        $.ajax({
            url : form.attr('action'),
            data : form.serialize(),
            type: 'POST',
            dataType: "json",
            success : function(resposta) {
                param = {'idDiv':"#dialog-message",
                         'largura':400,
                         'altura':200,
                         'titulo':"Alerta"};
                
                $('#depoimento').val('');
                $('#depoimento').focus();
                
                
                alertaDialog(resposta,param);
                
            }
        });
    });

    /* Gravra alterar senha do aluno */
    $('#alterarSenhaAluno').click(function(){

        $('body').append('<div id="dialog-message"></div>');

        var form = $('form[name=formAlterarSenha]');
        $.ajax({
            url : form.attr('action'),
            data : form.serialize(),
            type: 'POST',
            dataType: "json",
            success : function(resposta) {
                param = {'idDiv':"#dialog-message",
                         'largura':400,
                         'altura':200,
                         'titulo':"Alerta"};

                alertaDialog(resposta,param);
            }
        });
    });

    $('#enviarMensagem').click(function(){

        $('body').append('<div id="dialog-message"></div>');

        var form = $('form[name=formAjuda]');
        $.ajax({
            url : form.attr('action'),
            data : form.serialize(),
            type: 'POST',
            dataType: "json",
            success : function(resposta) {
                param = {'idDiv':"#dialog-message",
                         'largura':400,
                         'altura':200,
                         'titulo':"Alerta"};

                alertaDialog(resposta,param);
            }
        });
    });

    /* Alterar dados do aluno */
    $('#alterarDadosAluno').click(function(){

        $('body').append('<div id="dialog-message"></div>');

        var form = $('form[name=formAluno]');
        $.ajax({
            url : form.attr('action'),
            data : form.serialize(),
            type: 'POST',
            dataType: "json",
            success : function(resposta) {
                param = {'idDiv':"#dialog-message",
                         'largura':400,
                         'altura':200,
                         'titulo':"Alerta"};

                alertaDialog(resposta,param);
            }
        });
    });

    /* Alterar curriculo */
    $('#btnGravarCurriculo').click(function(){

        $('body').append('<div id="dialog-message"></div>');

        $.ajax({
            url : "home.php?pag=bcoOportunidade&arq=alterarCurriculoAluno.php",
            data : $('#formCurriculo').serialize(),
            type: 'POST',
            dataType: "json",
            success : function(resposta) {
                param = {'idDiv':"#dialog-message",
                         'largura':400,
                         'altura':200,
                         'titulo':"Alerta"};

                alertaDialog(resposta,param);
            }
        });
    });

    // Esconder a div de alert do aviso
    $("[data-hide]").on("click", function(){
        $("." + $(this).attr("data-hide")).hide();
        /*
         * The snippet above will hide all elements with the class specified in data-hide,
         * i.e: data-hide="alert" will hide all elements with the alert property.
         *
         * Xeon06 provided an alternative solution:
         * $(this).closest("." + $(this).attr("data-hide")).hide();
         * Use this if are using multiple alerts with the same class since it will only find the closest element
         * 
         * (From jquery doc: For each element in the set, get the first element that matches the selector by
         * testing the element itself and traversing up through its ancestors in the DOM tree.)
        */
    });
});

function verAviso(cod){
    var codAviso = '#aviso'+cod;
    $(codAviso).show();
}