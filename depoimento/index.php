<?php
$sql = "
SELECT
  ALU.Id_Numero,
  ALU.Nome AS Aluno,
  CUR.Codg_Curso,
  CUR.Nome AS Curso
FROM
  aluno ALU
INNER JOIN curso CUR ON
  CUR.Codg_Curso = ALU.Curso
WHERE
  ALU.Id_Numero = '".$_SESSION['id_numero']."' AND ALU.Ano = ".$_SESSION['ano'];
$result = mysql_query($sql) or die('Erro na consulta da Tabela de Usuario. '.mysql_error().'<br>'.$sql);
$dados = mysql_fetch_array($result);


// Verificar se já existe um depoimento digitado
$depoimento = "SELECT * FROM depoimento WHERE Aluno = '".$_SESSION['id_numero']."' AND Codg_Curso = ".$_SESSION['curso'];
$res_depoimento = mysql_query($depoimento) or die('Erro na consulta da Tabela de Depoimento. '.mysql_error().'<br>'.$depoimento);
$numero = mysql_num_rows($res_depoimento);

if($numero > 0){
?>
  <script>
    alert('Você já fez o seu Depoimento para este Curso.');
    document.location = "home.php";
  </script>
<?php
  exit;
}
?>
<h2>Depoimento</h2>

<form name="form_depoimento" method="post" action="depoimento/gravar.php" onSubmit="return Verificar()">
  <input type="hidden" name="aluno" value="<?php echo $dados['Id_Numero']; ?>">
  <input type="hidden" name="curso" value="<?php echo $dados['Codg_Curso']; ?>">
  <input type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>">
  <input type="hidden" name="status" value="0">

  <label>Aluno:</label><?php echo $dados['Aluno']; ?>

  <label>Curso:</label><?php echo $dados['Curso']; ?>

  <label>Depoimento:</label><textarea name="depoimento" cols="50" rows="12" class="txtInscricaoGrande" id="depoimento"></textarea>
 
  <button class="btn btn-large btn-primary" type="submit">Gravar Depoimento</button>
</form>