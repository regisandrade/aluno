<?php
class Senha{
	public function alterar($pdo,$parametros){
		try {
      echo "<pre>"; print_r($parametros); echo "</pre>";die;
      if (!empty($parametros['senha_antiga'])) {
        $resposta['mensagem'] = "Senha antiga não pode estar vazia.";
        $resposta['sucesso']  = false;
      }elseif (!empty($parametros['nova_senha']) {
        $resposta['mensagem'] = "Nova senha não pode estar vazia.";
        $resposta['sucesso']  = false;
      }elseif (!empty($parametros['repetir_senha']) {
        $resposta['mensagem'] = "Repetir senha não pode estar vazia.";
        $resposta['sucesso']  = false;
      }elseif ($parametros['nova_senha'] != $parametros['repetir_senha']) {
        $resposta['mensagem'] = "Nova senha não pode ser diferente de repetir senha.";
        $resposta['sucesso']  = false;
      }else{
        $sql = "UPDATE usuario_aluno SET 
                    Senha = :novaSenha
              WHERE
                    Id_Numero = :idNumero";

        $rs = $pdo->prepare($sql);
        $rs->execute(array(':novaSenha'=>$parametros['novaSenha']
                          ,':idNumero' =>$parametros['idNumero']));
        
        //var_dump($count, $rs->errorInfo());

        if(!$rs){
          $resposta['mensagem'] = "Erro ao alterar a senha.";
          $resposta['sucesso']  = false;
        }else{
          $resposta['mensagem'] = "Senha alterada com sucesso.";
          $resposta['sucesso']  = true;
        }
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