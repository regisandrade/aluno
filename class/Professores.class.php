<?php
class Professores{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT 
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
		                   T.Turma = ?
		               AND T.Ano   = ?
		            ORDER BY 
		                   P.Nome";
			
			$rs = $pdo->prepare($sql);
          	$rs->execute(array($parametros['turma'],
          		                        $parametros['ano']));
          	
          	//var_dump($count, $rs->errorInfo());

          	if(!$rs){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['professor'] = utf8_encode($registro->Professor);
          			$arrDados[$conta]['url'] = $registro->url ? $registro->url : '--';

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