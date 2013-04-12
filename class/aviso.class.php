<?php
class Aviso{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT 
					       Codg_Aviso
					      ,Titulo
					      ,Descricao
					      ,DATE_FORMAT(Data_Cadastro,'%d/%m/%Y') AS Data 
					FROM 
					       aviso 
					ORDER BY Codg_Aviso";
			
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
          			$arrDados[$conta]['CodigoAviso'] = $registro->Codg_Aviso;
          			$arrDados[$conta]['Titulo'] = $registro->Titulo;
          			$arrDados[$conta]['Descricao'] = $registro->Descricao;
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