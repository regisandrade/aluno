<?php
class Depoimento{

     public function incluir($pdo,$parametros){
          try {
               $sql = "INSERT INTO depoimento (
                              Aluno
                             ,Codg_Curso
                             ,Depoimento
                             ,DATA
                             ,STATUS
                       ) VALUES (
                              :aluno
                             ,:codgCurso
                             ,:depoimento
                             ,:data
                             ,:status)";
               
               $rs = $pdo->prepare($sql);
               $rs->execute(array(':aluno'=>$parametros['idNumero'],
                                  ':codgCurso'=>$parametros['codgCurso'],
                                  ':depoimento'=>$parametros['depoimento'],
                                  ':data'=>date('Y-m-d'),
                                  ':status'=>0));

               //var_dump($rs, $rs->errorInfo());

               if(!$rs){
                    $resposta['mensagem'] = "Erro ao tentar realizar o Depoimento.";
                    $resposta['sucesso']  = false;
               }else{
                    $resposta['mensagem'] = "Depoimento realizado com sucesso.";
                    $resposta['sucesso']  = true;
               }

          } catch (Exception $e) {
               $resposta['mensagem'] = $e;
               $resposta['sucesso']  = false;
          }

          $pdo = null;
          //return $arrDados;
          echo json_encode($resposta);
     }

     public function alterar(){

     }

     public function excluir(){
          
     }

     public function verificarDepoimento($pdo,$parametros=null){
          try {
               $sql = "SELECT 
                              * 
                       FROM 
                              depoimento 
                       WHERE 
                              Aluno      = ? 
                          AND Codg_Curso = ? ";
               
               $rs = $pdo->prepare($sql);
               $rs->execute(array($parametros['idNumero']
                                 ,$parametros['idCurso']));
               
               //var_dump($count, $rs->errorInfo());

               if(!$rs){
                    $resposta['mensagem'] = "Nenhum registro encontrado.";
                    $resposta['sucesso']  = false;
               }else{
                    $conta = 0;
                    $arrDados = array();
                    while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                      $arrDados[$conta]['idDepoimento'] = $registro->ID_Depoimento;
                      $arrDados[$conta]['aluno'] = $registro->Aluno;
                      $arrDados[$conta]['codgCurso'] = $registro->Codg_Curso;
                      $arrDados[$conta]['depoimento'] = $registro->Depoimento;
                      $arrDados[$conta]['data'] = $registro->DATA;
                      $arrDados[$conta]['status'] = $registro->STATUS;

                      $conta++;
                    }

                    $resposta['valores'] = $arrDados;
                    $resposta['sucesso'] = true;
               }

          } catch (Exception $e) {
               $resposta['mensagem'] = $e;
               $resposta['sucesso']  = false;
          }

          $pdo = null;
          return $arrDados;
          //echo json_encode($resposta);
     }

     public function pesquisar($pdo,$parametros=null){
          try {
               $sql = "SELECT 
                              * 
                       FROM 
                              depoimento";
               
               $rs = $pdo->prepare($sql);
               $count = $rs->execute();

               if($count === false){
                    $resposta['mensagem'] = "Nenhum registro encontrado.";
                    $resposta['sucesso']  = false;
               }else{
                    $conta = 0;
                    $arrDados = array();
                    while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                      $arrDados[$conta]['idDepoimento'] = $registro->ID_Depoimento;
                      $arrDados[$conta]['aluno'] = $registro->Aluno;
                      $arrDados[$conta]['codgCurso'] = $registro->Codg_Curso;
                      $arrDados[$conta]['depoimento'] = $registro->Depoimento;
                      $arrDados[$conta]['data'] = $registro->DATA;
                      $arrDados[$conta]['status'] = $registro->STATUS;

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