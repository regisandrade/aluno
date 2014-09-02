<?php
class Materiais{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT 
					      EXER.Codg_Exercicio
					     ,EXER.Ano
					     ,EXER.Exercicio
					     ,EXER.Turma
					     ,DATE_FORMAT(EXER.Data_Cadastro,'%d/%m/%Y') AS Data
					     ,EXER.Tipo_Material
					FROM
					      exercicio EXER
					INNER JOIN turma TUR ON 
					      TUR.TURMA = EXER.Turma
					  AND TUR.Ano   = EXER.Ano
					WHERE
					      TUR.Turma = ?
					GROUP BY
					      EXER.Codg_Exercicio
					ORDER BY
					      EXER.Exercicio";
			
			$rs = $pdo->prepare($sql);
          	$rs->execute(array($parametros['turma']));

          	//var_dump($num);

          	if(!$rs){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['ano'] = $registro->Ano;
          			$arrDados[$conta]['exercicio'] = $registro->Exercicio;
          			$arrDados[$conta]['turma'] = $registro->Turma;
          			$arrDados[$conta]['data'] = $registro->Data;
          			$arrDados[$conta]['tipoMaterial'] = $registro->Tipo_Material;

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