<?php
//== Selecionar o Curriculos
$comando = "SELECT 
                   P.Nome as Professor
                  ,P.Id_Numero
                  ,C.url
            FROM 
                   professor P
            LEFT JOIN curriculo C ON 
                   C.CodgProfessor = P.Id_Numero
            INNER JOIN turma T ON 
                   T.Professor = P.Id_Numero
            WHERE 
                   T.Turma = '".$_SESSION['turma']."'
               AND T.Ano   = ".$_SESSION['ano']."
            ORDER BY 
                   P.Nome";
//print($comando);
$resultado = mysql_query($comando) or die ("<font face='Verdana' size='2'>Erro na Consulta dos Curriculos. <br><strong>Comando:</strong> <font color='#FF0000'>".$comando."</font><br><strong>Erro:</strong> ".mysql_error());
$numero = mysql_num_rows($resultado);
?>
<h2>Professores(as)</h2>
<table align="center" border="0" cellpadding="0" cellspacing="2" style="border: solid 1px #CCCCCC">
     <tr bgcolor="#DDDDDD">
       <td width="90%" height="17" ><strong>Nome</strong></td>
       <td width="10%" style="text-align: center;"><strong>Currículo</strong></td>
     </tr>
     <?php
       if($numero == 0){
     ?>
        <tr>
          <td height="17" colspan="2" align="center" ><p>Nenhum registro encontrado.</p></td>
        </tr>
    <?php
      }else{
            $conta = 0;
            $mudaProfessor = null;
            while($registro = mysql_fetch_array($resultado)){
                if($conta % 2 == 1){
                    $cor = '#DDEEFF';
                }else{
                    $cor = '#FFFFFF';
                }
                if($registro['Professor'] != '' && ($mudaProfessor != $registro['Id_Numero'])){
                    echo "<tr bgcolor=\"$cor\">";
                    echo "<td class=\"celulaResultado\">".$registro['Professor']."</td>";

                    if(!empty($registro['url'])){
                    ?>
                        <td style="text-align: center;"><a href="http://<?=trim($registro['url']);?>" target="_blank"><img src="../imagens/disco.gif" width="13" height="17" border="0" align="absmiddle"></a></td>
                    <?php
                    }else{
                    ?>
                        <td style="text-align: center;">--</td>
                    <?php
                    }
                    echo "</tr>";
                    $conta++;
                }
                $mudaProfessor = $registro['Id_Numero'];
            }
	?>
        <tr bgcolor="#DDDDDD">
          <td colspan="2" ><strong>Total de currículos:</strong> <?php print($numero); ?></td>
        </tr>
    <?php
      }
    ?>
</table>
<p>&nbsp;</p>
