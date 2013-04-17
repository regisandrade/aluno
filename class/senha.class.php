<?php
class Senha{
	public function alterar($pdo,$parametros=null){
		try {
			$sql = "UPDATE usuario_aluno SET 
                              Senha = ? 
                       WHERE
			               Login = ?";
			
			$rs = $pdo->prepare($sql);
          	$count = $rs->execute(array($parametros['nova_senha']
                                          ,$parametros['Login']));
          	
          	//var_dump($count, $rs->errorInfo());

          	if($count === false){
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