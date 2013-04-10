<?php
//== Consultar Artigos
$comando = "
SELECT
  Codg_Artigo,
  Descricao,
  Artigo,
  DATE_FORMAT(Data,'%d/%m/%Y') AS Data
FROM
  artigo
WHERE
  Todos = 1
ORDER BY
  Artigo
";
$result = mysql_query($comando) or die ("<font face='Verdana' size='2'>Erro na Consulta dos Artigos. <br><b>Comando:</b> <font color='#FF0000'>".$comando."</font><br><b>Erro:</b> ".mysql_error());
$num = mysql_num_rows($result);
?>
<h2>Artigos</h2>
<table border="0" align="center" cellpadding="0" cellspacing="2" style="border: solid 1px #CCCCCC">
  <tr bgcolor="#DDDDDD">
    <td width="80%" ><strong>Artigos</strong></td>
    <td width="20%" ><strong>Data</strong></td>
    </tr>
  <?php
    if($num < 1){
    ?>
  <tr>
    <td  colspan="2" align="center"><p>Nenhum registro encontrado.</p></td>
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
  ?>
  <tr bgcolor="<?php print($cor); ?>">
    <td ><a href="../artigos/<?php print($registro['Artigo']); ?>" target="_blank"><?php print($registro['Descricao']); ?></a></td>
    <td ><?php print($registro['Data']); ?></td>
    </tr>
  <?php
    $conta++;
    $numero++;
      }
    }
    ?>
</table>
<p>&nbsp;</p>
