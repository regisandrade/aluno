<?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//== Selecionar o Curso
$cmd_turma = "SELECT * FROM turma WHERE Turma = '".$_SESSION['turma']."'";
$res_turma = mysql_query($cmd_turma) or die ("<font face='Verdana' size='2'>Erro na Consulta da Turma. <br><strong>Comando:</strong> <font color='#FF0000'>".$cmd_turma."</font><br><strong>Erro:</strong> ".mysql_error());
$reg_turma = mysql_fetch_array($res_turma);

$arrTurmas = array('PJA001','CF011','GP002','AU006','AU005','CF010');

//== Consultar Notas
$comando = "
SELECT DISTINCT
        AC.Turma
       ,DIS.Nome AS NomeDisciplina
       ,AC.Nota
       ,AC.Frequencia
       ,AC.Aluno
       ,CRO.Data_01
       ,CRO.Data_02
       ,CRO.Data_03
       ,CRO.Data_04
       ,CRO.Data_05
       ,CRO.Data_06
FROM
        alunos_academicos AC
INNER JOIN disciplina DIS ON
        (DIS.Codg_Disciplina = AC.Disciplina)
INNER JOIN cronograma CRO ON
        (CRO.Turma = AC.Turma AND CRO.Disciplina = AC.Disciplina)
WHERE
        AC.Ano   = ".$_SESSION['ano']."
    AND AC.Turma = '".$_SESSION['turma']."'
    AND AC.Aluno = '".$_SESSION['id_numero']."'";
if(!in_array($_SESSION['turma'], $arrTurmas)){
    $comando .= "     \nAND AC.Disciplina <> 23 ";
}
$comando .= "
ORDER BY
        CRO.Data_01, CRO.Data_02, CRO.Data_03, CRO.Data_04, CRO.Data_05, CRO.Data_06";
//echo "<pre>";
//print_r($comando);
//echo "</pre>";

$result = mysql_query($comando) or die ("<font face='Verdana' size='2'>Erro na Consulta da  Nota/Frequência.");
$num = mysql_num_rows($result);
?>
<h2>Notas/Frequências</h2>
<p><strong>Turma:</strong>&nbsp;<?php print($_SESSION['turma']."|".$reg_turma['Nome']); ?></p>
<table align="center" border="0" cellpadding="0" cellspacing="2" style="border: solid 1px #CCCCCC">
    <tr bgcolor="#DDDDDD">
        <td width="78%" ><strong>Disciplina</strong></td>
        <td width="12%" align="center" ><strong>Frequência</strong></td>
        <td width="10%" align="center" ><strong>Nota</strong></td>
    </tr>
    <?php
        if($num < 1){
    ?>
        <tr>
            <td  colspan="3" align="center"><p>Nenhum registro encontrado.</p></td>
        </tr>
    <?php
        }else{
            $conta = 0;
            $numero = 1;

            while($registro = mysql_fetch_array($result)){
                if($conta % 2 == 1){
                    $cor = '#DDEEFF';
                }else{
                    $cor = '#FFFFFF';
                }
                $corFonte = "#000000";
                if($registro['Nota'] < 7){
                    $corFonte = "#FF0000";
                }
    ?>
                <tr bgcolor="<?php print($cor); ?>">
                    <td height="17" ><?php echo $numero.'. '.$registro['NomeDisciplina']; ?></td>
                    <td  align="center"><?php print($registro['Frequencia']); ?></td>
                    <td  align="center" style="color: <?php echo $corFonte; ?>"><?php print(number_format($registro['Nota'],1,',','.')); ?></td>
                </tr>
    <?php
                $conta++;
                $numero++;
            }
        }
?>
</table>
<p align="center"><input type="button" name="botao" value="Imprimir" onClick="window.print()" style="border: solid 1px #000000; background-color: #FFFFFF"></p>
<p>&nbsp;</p>
