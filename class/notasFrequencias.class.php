<?php
class NotasFrequencias{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT DISTINCT
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
					        AC.Ano   = ?
					    AND AC.Turma = ?
					    AND AC.Aluno = ?";
					
					if(!in_array($_SESSION['turma'], $arrTurmas)){
					    $comando .= "     \nAND AC.Disciplina <> 23 \n";
					}

					$sql .= "ORDER BY
					        CRO.Data_01, CRO.Data_02, CRO.Data_03, CRO.Data_04, CRO.Data_05, CRO.Data_06";
			
			$rs = $pdo->prepare($sql);
          	$rs->execute(array($parametros['ano'],
          	                   $parametros['turma'],
          	                   $parametros['idNumero']));

          	//var_dump($count, $rs->errorInfo());

          	if(!$rs){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['disciplina'] = utf8_encode($registro->NomeDisciplina);
          			$arrDados[$conta]['nota'] = $registro->Nota;
          			$arrDados[$conta]['frequencia'] = $registro->Frequencia;

          			$conta++;
          		}

          		$resposta['valores'] = $arrDados;
          		$resposta['sucesso'] = true;
          	}

		} catch (Exception $e) {
			$resposta['mensagem'] = $e;
          	$resposta['sucesso'] = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

}
?>