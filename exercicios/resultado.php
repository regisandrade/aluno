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
	TUR.Turma = '".$_SESSION['turma']."'
ORDER BY SUBSTRING(EXER.Turma,-3), EXER.Tipo_Material, EXER.Data_Cadastro, EXER.Exercicio";
//echo "<pre>";print_r($comando);
$result = mysql_query($comando) or die ("Erro na consulta de exercicios");
$num = mysql_num_rows($result);
/**
WHERE
	SUBSTRING(Turma,1,5) = '".$_SESSION['turma']."'
**/
?>
<h2>Material disponível - Turma atual</h2>
	<table width="300px" border="0" align="center" cellpadding="0" cellspacing="2">
		<?php
		  if($num < 1){
		?>
		<tr>
		  <td align="center"><p>Nenhum registro encontrado.</p></td>
		</tr>
		<?php
		  }else{
		?>
		<tr>
		  <td><strong><?php echo $_SESSION['turma']."-".$_SESSION['nomeTurma']; ?></strong></td>
		</tr>
		<?php
			$conta = 0;
			$muda_tipo = 0;
			$muda_disciplina = 0;
			while($registro = mysql_fetch_array($result)){
				if($conta % 2 == 1){
					$cor = '#DDEEFF';
				}else{
					$cor = '#FFFFFF';
				}
				if($muda_disciplina != 0){
					if($muda_disciplina != $registro['Disciplina']){
					?>
						<tr bgcolor="#EEEEEE">
						  <td><strong><?php echo $registro['NomeDisciplina']; ?></strong></td>
						</tr>
					<?php
					}
				}
				if($conta == 0){
				?>
					<tr bgcolor="#EEEEEE">
					  <td><strong><?php echo $registro['NomeDisciplina']; ?></strong></td>
					</tr>
					<tr>
					  <td style="padding-left: 2em"><strong><?php
						switch($registro['Tipo_Material']){
							case 1:
								print('Exercícios');
							break;
							case 2:
								print('Material Didático');
							break;
							case 3:
								print('Material de Apoio');
							break;
							case 4:
								print('Trabalhos');
							break;
							case 5:
								print('Apostilas');
							break;
				  		}
				  	?></strong></td>
					</tr>
				<?php
				}
				
				if($muda_tipo != 0){
					if($muda_tipo != $registro['Tipo_Material']){
					?>
						<tr>
						  <td style="padding-left: 2em"><strong><?php
						switch($registro['Tipo_Material']){
							case 1:
								print('Exercícios');
							break;
							case 2:
								print('Material Didático');
							break;
							case 3:
								print('Material de Apoio');
							break;
							case 4:
								print('Trabalhos');
							break;
							case 5:
								print('Apostilas');
							break;
					  	}
					  ?></strong></td>
						</tr>
					<?php
					}
				}
				?>
				<tr bgcolor="<?php print($cor); ?>">
				  <td style="padding-left: 4em">&bull;&nbsp;<a href="../exercicios/<?=$registro['Exercicio']; ?>" target="_blank" title="Data: <?=$registro['Data']; ?>"><?=$registro['Exercicio']; ?></a></td>
				</tr>
				<?php
			$conta++;
			$muda_disciplina = $registro['Disciplina'];
			$muda_tipo = $registro['Tipo_Material'];
			}
		  }
		?>
    </table>
    <p>&nbsp;</p>
