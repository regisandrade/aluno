<?php
class Cronograma{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT
					       DISC.Nome AS Disciplina
					      ,DATE_FORMAT(CRO.Data_01,'%d/%m/%Y') AS Data_1
					      ,DATE_FORMAT(CRO.Data_02,'%d/%m/%Y') AS Data_2
					      ,DATE_FORMAT(CRO.Data_03,'%d/%m/%Y') AS Data_3
					      ,DATE_FORMAT(CRO.Data_04,'%d/%m/%Y') AS Data_4
					      ,DATE_FORMAT(CRO.Data_05,'%d/%m/%Y') AS Data_5
					      ,DATE_FORMAT(CRO.Data_06,'%d/%m/%Y') AS Data_6
					FROM
					       cronograma CRO
					INNER JOIN disciplina DISC ON
					       DISC.Codg_Disciplina = CRO.Disciplina
					WHERE
					       CRO.Turma = ?
					ORDER BY
					       CRO.Data_01, CRO.Data_02, CRO.Data_03, CRO.Data_04, CRO.Data_05, CRO.Data_06 DESC";
			
			$rs = $pdo->prepare($sql);
          	$count = $rs->execute(array($parametros['turma']));
          	
          	//var_dump($count, $rs->errorInfo());

          	if($count === false){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['Disciplina'] = $registro->Disciplina;
          			$arrDados[$conta]['Data_1'] = ($registro->Data_1 != '00/00/0000' ? $registro->Data_1 : '--');
          			$arrDados[$conta]['Data_2'] = ($registro->Data_2 != '00/00/0000' ? $registro->Data_2 : '--');
          			$arrDados[$conta]['Data_3'] = ($registro->Data_3 != '00/00/0000' ? $registro->Data_3 : '--');
          			$arrDados[$conta]['Data_4'] = ($registro->Data_4 != '00/00/0000' ? $registro->Data_4 : '--');
          			$arrDados[$conta]['Data_5'] = ($registro->Data_5 != '00/00/0000' ? $registro->Data_5 : '--');
          			$arrDados[$conta]['Data_6'] = ($registro->Data_6 != '00/00/0000' ? $registro->Data_6 : '--');

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