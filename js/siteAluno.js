/* Gravra depoimento do aluno */
$('#gravarDepoimento').live('click',function(){

    $('body').append('<div id="alertaGravarDepoimento"></div>');

    var form = $('form[name=formDepoimento]');
    $.ajax({
        url : form.attr('action'),
        data : form.serialize(),
        type: 'POST',
        dataType: "json",
        success : function(resposta) {
            //console.log(resposta.sucesso);
            //console.log(resposta.valor);
            if(resposta && resposta.sucesso == true){
            	$('#alertaGravarDepoimento').html(resposta.mensagem);
                //alert(resposta.mensagem);
            }else{
                //alert(resposta.mensagem);
                $('#alertaGravarDepoimento').html(resposta.mensagem);
            }
            // Dialog
            $('#alertaGravarDepoimento').dialog({
                resizable: false,
                //width:'450',
                //height:'360',
                title: 'Alerta',
                modal: true,
                close: function(){
                    $('#alertaGravarDepoimento').remove();
                },
                buttons: {
                    "Fechar": function() {
                        $(this).dialog( "close" );
                        return false;
                    }
                }
            });
        }
    });
});

/* Gravra alterar senha do aluno */
$('#alterarSenhaAluno').live('click',function(){

    $('body').append('<div id="alertaAlteraSenha"></div>');

    var form = $('form[name=formAlterarSenha]');
    $.ajax({
        url : form.attr('action'),
        data : form.serialize(),
        type: 'POST',
        dataType: "json",
        success : function(resposta) {
            //console.log(resposta.sucesso);
            //console.log(resposta.valor);
            if(resposta && resposta.sucesso == true){
                $('#alertaAlteraSenha').html(resposta.mensagem);
                //alert(resposta.mensagem);
            }else{
                //alert(resposta.mensagem);
                $('#alertaAlteraSenha').html(resposta.mensagem);
            }
            // Dialog
            $('#alertaAlteraSenha').dialog({
                resizable: false,
                //width:'450',
                //height:'360',
                title: 'Alerta',
                modal: true,
                close: function(){
                    $('#alertaAlteraSenha').remove();
                },
                buttons: {
                    "Fechar": function() {
                        $(this).dialog( "close" );
                        return false;
                    }
                }
            });
        }
    });
});

$('#alterarSenhaAluno').live('click',function(){
    $('body').append('<div id="alertaAjuda"></div>');

    var form = $('form[name=formAjuda]');
    $.ajax({
        url : form.attr('action'),
        data : form.serialize(),
        type: 'POST',
        dataType: "json",
        success : function(resposta) {
            //console.log(resposta.sucesso);
            //console.log(resposta.valor);
            if(resposta && resposta.sucesso == true){
                $('#alertaAjuda').html(resposta.mensagem);
                //alert(resposta.mensagem);
            }else{
                //alert(resposta.mensagem);
                $('#alertaAjuda').html(resposta.mensagem);
            }
            // Dialog
            $('#alertaAjuda').dialog({
                resizable: false,
                //width:'450',
                //height:'360',
                title: 'Alerta',
                modal: true,
                close: function(){
                    $('#alertaAjuda').remove();
                },
                buttons: {
                    "Fechar": function() {
                        $(this).dialog( "close" );
                        return false;
                    }
                }
            });
        }
    });
});

/* Alterar dados do aluno */
$('#alterarDadosAluno').live('click',function(){

    $('body').append('<div id="alertaDados"></div>');

    var form = $('form[name=formAluno]');
    $.ajax({
        url : form.attr('action'),
        data : form.serialize(),
        type: 'POST',
        dataType: "json",
        success : function(resposta) {
            //console.log(resposta.sucesso);
            //console.log(resposta.valor);
            if(resposta && resposta.sucesso == true){
                $('#alertaDados').html(resposta.mensagem);
                //alert(resposta.mensagem);
            }else{
                //alert(resposta.mensagem);
                $('#alertaDados').html(resposta.mensagem);
            }
            // Dialog
            $('#alertaDados').dialog({
                resizable: false,
                //width:'450',
                //height:'360',
                title: 'Alerta',
                modal: true,
                close: function(){
                    $('#alertaDados').remove();
                },
                buttons: {
                    "Fechar": function() {
                        $(this).dialog( "close" );
                        return false;
                    }
                }
            });
        }
    });
});