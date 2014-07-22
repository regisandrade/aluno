<?php
// Tipo de Material
$tipo_material = 0;

//== Consultar Exercicio
$comando = "
SELECT DISTINCT EXER.Ano
	, EXER.Exercicio
	, SUBSTRING(EXER.Turma,1,6) AS Turma
	, DIS.Nome AS NomeDisciplina
	, SUBSTRING(EXER.Turma,-3) AS Disciplina
	, DATE_FORMAT(EXER.Data_Cadastro,'%d/%m/%Y') AS Data
	, EXER.Tipo_Material
FROM
	exercicio EXER
INNER JOIN disciplina DIS ON DIS.Codg_Disciplina = SUBSTRING(EXER.Turma,-3)
INNER JOIN turma TUR ON TUR.Turma = SUBSTRING(EXER.Turma,1,6)
WHERE
	TUR.Curso = ".$_SESSION['curso']." AND
	TUR.Turma <> '".$_SESSION['turma']."'
ORDER BY EXER.Tipo_Material, DIS.Nome, EXER.Data_Cadastro, EXER.Exercicio";
$result = mysql_query($comando) or die ("<font face='Verdana' size='2'>Erro na Consulta de Exercicio. <br><b>Comando:</b> <font color='#FF0000'>".$comando."</font><br><b>Erro:</b> ".mysql_error());
$num = mysql_num_rows($result);
/**
WHERE
	SUBSTRING(Turma,1,5) = '".$_SESSION['turma']."'
**/
?>
<h2>Material disponí­vel - Turma anterior</h2>
	<table width="432px" border="0" align="center" cellpadding="0" cellspacing="2">
		<?php
		  if($num < 1){
		?>
		<tr>
		  <td colspan="3" align="center" ><p>Nenhum registro encontrado.</p></td>
		</tr>
		<?php
		  }else{
			$conta = 0;
			$muda_tipo = 0;
			while($registro = mysql_fetch_array($result)){
			    if($conta % 2 == 1){
				$cor = '#DDEEFF';
			    }else{
				$cor = '#FFFFFF';
			    }
				if($muda_tipo != 0){
					if($muda_tipo != $registro['Tipo_Material']){
					?>
					<tr bgcolor="#DDDDDD">
					  <td width="5%" ><strong>Turma</strong></td>
					  <td style="padding-left: 0.3em"><strong><?php
					  switch($registro['Tipo_Material']){
						case 1:
							print('Exercí­cios');
						break;
						case 2:
							print('Material didático');
						break;
						case 3:
							print('Material de apoio');
						break;
						case 4:
							print('Trabalhos');
						break;
					  }
					  ?></strong></td>
					  <td ><strong>Disciplina</strong></td>
					</tr>
					<?php
					}
				}
				if($conta == 0){
					?>
					<tr bgcolor="#DDDDDD">
					  <td width="5%" ><strong>Turma</strong></td>
					  <td ><strong><?php
					  switch($registro['Tipo_Material']){
						case 1:
							print('Exercí­cios');
						break;
						case 2:
							print('Material didático');
						break;
						case 3:
							print('Material de apoio');
						break;
						case 4:
							print('Trabalhos');
						break;
					  }
					  ?></strong></td>
					  <td ><strong>Disciplina</strong></td>
					</tr>
					<?php
				}
		?>
		<tr bgcolor="<?php print($cor); ?>">
		  <td ><?=$registro['Turma']?></td>
		  <td ><a href="../exercicios/<?=$registro['Exercicio']; ?>" target="_blank" title="Data: <?=$registro['Data']; ?>"><?=$registro['Exercicio']; ?></a></td>
		  <td ><?=$registro['NomeDisciplina']; ?></td>
		</tr>
		<?php
			$conta++;
			$muda_tipo = $registro['Tipo_Material'];
			}
		  }
		?>
    </table>
    <p>&nbsp;</p>
