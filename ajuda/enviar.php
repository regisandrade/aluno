<?php
require_once "../../lib/util.class.php";
$util = new Util();

if (!empty($_REQUEST['nome']) && !empty($_REQUEST['email']) && !empty($_REQUEST['para']) && !empty($_REQUEST['mensagem'])) {
	
    $parametros['html']      = "SIM";
    $parametros['assunto']   = "Mensagem enviada pela área do aluno";
    $parametros['mensagem']  = utf8_decode($_REQUEST['mensagem']);
    $parametros['emailPara'] = $_REQUEST['para'];
    $parametros['nomeFrom']  = $_REQUEST['nome'];
    $parametros['emailFrom'] = $_REQUEST['email'];
    
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
	
    if($util->enviarEmail($parametros)){
        $resposta['mensagem'] = "Mensagem enviada com sucesso.";
        $resposta['sucesso']  = true;
    }else{
        $resposta['mensagem'] = "Erro ao enviar a mensagem.";
        $resposta['sucesso']  = false;
    }

}else{
    $resposta['mensagem'] = "Por favor, preencher todos os campos para enviar a mensagem.";
    $resposta['sucesso']  = false;
}
echo json_encode($resposta);
?>