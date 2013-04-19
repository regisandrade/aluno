<?php
class Links{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT 
			               * 
			        FROM 
			               links \n";
                        if($parametros['order']){
                           $sql .= "ORDER BY ".$parametros['order'];
                        }else{
                           $sql .= "ORDER BY Descricao";
                        }
			
			$rs = $pdo->prepare($sql);
    	$rs->execute();
    	
    	//var_dump($count, $rs->errorInfo());

    	if(!$rs){
    		$resposta['mensagem'] = "Nenhum registro encontrado.";
    		$resposta['sucesso'] = false;
    	}else{
    		$conta = 0;
    		$arrDados = array();
    		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
    			$arrDados[$conta]['Tipo'] = $registro->Tipo;
    			$arrDados[$conta]['Link'] = $registro->Link;
    			$arrDados[$conta]['Descricao'] = $registro->Descricao;

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
