<?php
class Turma{
	public function pesquisarDataInicialFinal($pdo,$parametros=null){
		try {
			$sql = "SELECT 
                           Nome AS NomeTurma
                          ,DATE_FORMAT(Data_Inicial,'%d/%m/%Y') AS Data_Inicial
                          ,DATE_FORMAT(Data_Final,'%d/%m/%Y') AS Data_Final
                    FROM 
                           turma
                    WHERE 
                           Turma = ?
                    GROUP BY 
                           Descricao";
			
    		$rs = $pdo->prepare($sql);
        	$rs->execute(array($parametros['turma']));

        	//var_dump($rs, $rs->errorInfo());

        	if(!$rs){
        		$resposta['mensagem'] = "Nenhum registro encontrado.";
        		$resposta['sucesso'] = false;
        	}else{
        		$conta = 0;
        		$arrDados = array();
                
        		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
        			$arrDados[$conta]['nomeTurma'] = utf8_encode($registro->NomeTurma);
        			$arrDados[$conta]['dataInicial'] = $registro->Data_Inicial;
        			$arrDados[$conta]['dataFinal'] = $registro->Data_Final;

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