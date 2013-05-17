<?php
class Aviso{

     /**
     * Pesquisa generica para pesquisa de avisos:
     *   -> Pode pesquisar por codigoAviso
     *   -> Pode limitar a quantidade de registro para retornar
     *
     *
     */
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT 
                    Codg_Aviso
                   ,Titulo
                   ,Descricao
                   ,DATE_FORMAT(Data_Cadastro,'%d/%m/%Y') AS Data 
             FROM 
                    aviso \n";
               
      if($parametros['codigoAviso']){
         $sql .= "WHERE 
                     Codigo_Aviso = ".$parametros['codigoAviso'];
      }
             
      $sql .= "\nORDER BY 
                     Codg_Aviso";

      if($parametros['numLimite']){
          $sql .= " \n LIMIT ".$parametros['numLimite'];
      }

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