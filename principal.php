<?php
if($_SESSION['statusCurso'] == 0){
	echo '<h1 style="text-align: center">Curso bloqueado</h1>';
}
?>
<h2>Meus dados</h2>
<ul>
    <li><strong>Nome:</strong> <?php echo iconv('UTF-8','ISO-8859-1',$_SESSION['nome']); ?></li>
    <li><strong>e-Mail:</strong> <?php echo $_SESSION['eMail']; ?></li>
    <li><strong>Turma:</strong> <?php echo $_SESSION['turma']."-".iconv('UTF-8','ISO-8859-1',$_SESSION['nomeTurma']); ?></li>
    <li><strong>Perí­odo do curso:</strong> <?php echo $dados['Data_Inicial']." a ".$dados['Data_Final']; ?></li>
</ul>
<h2>Avisos</h2>
<?php
if($num_aviso == 0){
    echo "<p>Nenhum aviso cadastrado.</p>";
}else{
    echo "<ul>";
    while($reg_aviso = mysql_fetch_array($res_aviso)){
        echo "<li><a href=\"#\" onClick=\"Abrir_Aviso(".$reg_aviso['Codg_Aviso'].",318,250)\">".$reg_aviso['Titulo']."</a>&nbsp;-&nbsp;<i>".$reg_aviso['Data']."</i></li>";
    }
    echo "<ul>";
}
?>
