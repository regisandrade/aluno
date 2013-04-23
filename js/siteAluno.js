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