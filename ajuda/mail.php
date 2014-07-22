<?php
//=============================================//
// Proprietário : IPECON - Ensino e Consultoria
// Site : www.ipecon.com.br
// Autor : Régis Rodrigues de Andrade
// Página : Envio de dúvida pelo Aluno
//=============================================//

# Assunto
$assunto = "Dúvida do Aluno: ".$nome;

# Mensagem
$texto = '<p style="font-family:Verdana, Arial, Helvetica, sans-serif"><center><h4>Dúvida do Aluno: '.$nome.'</h4></center>';
$texto .= $mensagem.'</p>';

# Cabeçalho
$cabecalho  = "MIME-Version: 1.0\r\n";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabecalho .= "From: ".$nome." <".$email.">";

# Enviar
mail($para,$assunto,$texto,$cabecalho);

# Resposta
?>
<script>
   alert("Dúvida enviada com sucesso.");
   document.location = "../home.php?pagina=13";
</script>
