<?php
class Senha{
	public function alterar($pdo,$parametros=null){
		try {
			$sql = "UPDATE usuario_aluno SET 
                              Senha = ? 
                       WHERE
			               Login = ?";
			
			$rs = $pdo->prepare($sql);
          	$rs->execute(array($parametros['novaSenha']
                                 ,$parametros['login']));
          	
          	//var_dump($count, $rs->errorInfo());

          	if(!$rs){
          		$resposta['mensagem'] = "Erro ao alterar a senha.";
          		$resposta['sucesso']  = false;
          	}else{
          		$resposta['mensagem'] = "Senha alterada com sucesso.";
                    $resposta['sucesso']  = true;
          	}

		} catch (Exception $e) {
			$resposta['mensagem'] = $e;
          	$resposta['sucesso'] = false;
		}

		$pdo = null;
		//return $arrDados;
		echo json_encode($resposta);
	}

}
?>