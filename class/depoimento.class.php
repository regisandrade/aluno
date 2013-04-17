<?php
class Depoimento{

     public function incluir(){

     }

     public function gravar(){

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
               $count = $rs->execute(array($parametros['idNumero']
                                          ,$parametros['idCurso']));
               
               //var_dump($count, $rs->errorInfo());

               if($count === false){
                    $resposta['mensagem'] = "Nenhum registro encontrado.";
                    $resposta['sucesso']  = false;
               }else{
                    $resposta['mensagem'] = "Você já realizou Depoimento para este Curso.";
                    $resposta['sucesso']  = true;
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
                    $resposta['valores']  = "";
                    $resposta['mensagem'] = "";
                    $resposta['sucesso']  = true;
               }
               
          } catch (Exception $e) {
               $resposta['mensagem'] = $e;
               $resposta['sucesso'] = false;
          }
     }

}
?>