<?php
class Artigo{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT
					       Codg_Artigo
					      ,Descricao
					      ,Artigo
					      ,DATE_FORMAT(Data,'%d/%m/%Y') AS Data
					FROM
					       artigo
					WHERE
					       Todos = 1
					ORDER BY
					       Artigo";
			
			$rs = $pdo->prepare($sql);
          	$count = $rs->execute();
          	
          	//var_dump($count, $rs->errorInfo());

          	if($count === false){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['CodigoArtigo'] = $registro->Codg_Artigo;
          			$arrDados[$conta]['Descricao'] = $registro->Descricao;
          			$arrDados[$conta]['Artigo'] = $registro->Artigo;
          			$arrDados[$conta]['Data'] = $registro->Data;

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