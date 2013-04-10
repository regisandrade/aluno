<?php
// Listar o cronograma para este curso
$comando = "
SELECT
      DISC.Nome AS Disciplina,
      DATE_FORMAT(CRO.Data_01,'%d/%m/%Y') AS Data_1,
      DATE_FORMAT(CRO.Data_02,'%d/%m/%Y') AS Data_2,
      DATE_FORMAT(CRO.Data_03,'%d/%m/%Y') AS Data_3,
      DATE_FORMAT(CRO.Data_04,'%d/%m/%Y') AS Data_4,
      DATE_FORMAT(CRO.Data_05,'%d/%m/%Y') AS Data_5,
      DATE_FORMAT(CRO.Data_06,'%d/%m/%Y') AS Data_6
FROM
    cronograma CRO
INNER JOIN disciplina DISC ON
    DISC.Codg_Disciplina = CRO.Disciplina
WHERE
  CRO.Turma = '".$_SESSION['turma']."'
ORDER BY
  CRO.Data_01, CRO.Data_02, CRO.Data_03, CRO.Data_04, CRO.Data_05, CRO.Data_06 DESC";
$resultado = mysql_query($comando) or die('Erro na consuta do Cronograma. '.$comando.' '.mysql_error());
$numero = mysql_num_rows($resultado);
?>
<h2>Cronograma</h2>
<p>&bullet;&nbsp;Sujeita a alterações</p>
   <table align="center" border="0" cellpadding="0" cellspacing="2" style="border: solid 1px #CCCCCC">
     <tr bgcolor="#dddddd">
        <td width="40%" ><strong>Disciplina</strong></td>
         <td width="10%"  align="center"><strong>1&ordf; Data </strong></td>
         <td width="10%"  align="center"><strong>2&ordf; Data </strong></td>
         <td width="10%"  align="center"><strong>3&ordf; Data</strong></td>
         <td width="10%"  align="center"><strong>4&ordf; Data </strong></td>
         <td width="10%"  align="center"><strong>5&ordf; Data </strong></td>
         <td width="10%"  align="center"><strong>6&ordf; Data</strong></td>
     </tr>
     <?php
      if($numero == 0){
        ?>
              <tr align="center">
                <td colspan="7" ><p>Nenhum registro encontrado.</p></td>
              </tr>
              <?php
        }else{
        $conta = 0;
        while($dados = mysql_fetch_array($resultado)){ 
          if($conta % 2 == 1){
            $cor = '#DDEEFF';
          }else{
            $cor = '#FFFFFF';
          }
        ?>
              <tr bgcolor="<?php print($cor); ?>">
                <td ><?php print($conta + 1); ?>.&nbsp;<?php print($dados['Disciplina']); ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php print($dados['Data_1']); ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php print($dados['Data_2']); ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php print($dados['Data_3']); ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php print($dados['Data_4']); ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php
        if($dados['Data_5'] == ''){
          print('--');
        }else{
          print($dados['Data_5']);
        }
        ?></td>
                <td bgcolor="<?php print($cor); ?>" class="celulaResultadoMenor"><?php
        if($dados['Data_6'] == ''){
          print('--');
        }else{
          print($dados['Data_6']);
        }
        ?></td>
              </tr>
              <?php
        $conta++;
        }
        }
        ?>
            </table>
    <p>&nbsp;</p>
