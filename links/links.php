<?php
$comando = "SELECT * FROM links ORDER BY Descricao";
$res_univer = mysql_query($comando) or die ("Erro na Consulta do Link. ".mysql_error());
$res_biblio = mysql_query($comando) or die ("Erro na Consulta do Link. ".mysql_error());
$res_outro = mysql_query($comando) or die ("Erro na Consulta do Link. ".mysql_error());
$res_conselho = mysql_query($comando) or die ("Erro na Consulta do Link. ".mysql_error());
?>
<h2>Links</h2>
<h3>Universidades</h3>
<ul>
    <?php
    while($reg_univer = mysql_fetch_array($res_univer)){
	if($reg_univer['Tipo'] == '1'){
	?>
	    <li><a href="http://www.<?php print($reg_univer['Link']); ?>/" target="_blank"><?php print($reg_univer['Descricao']); ?></a></li>
	<?php
	}
    }
    ?>
</ul>

<h3>Bibliotecas</h3>
<ul>
    <?php
    while($reg_biblioteca = mysql_fetch_array($res_biblio)){
	if($reg_biblioteca['Tipo'] == '2'){
    ?>
	    <li><a href="http://www.<?php print($reg_biblioteca['Link']); ?>/" target="_blank"><?php print($reg_biblioteca['Descricao']); ?></a></li>
    <?php
	}
    }
    ?>
</ul>

<h3>Conselho</h3>
<ul>
    <?php
    while($reg_conselho = mysql_fetch_array($res_conselho)){
	if($reg_conselho['Tipo'] == '4'){
    ?>
	    <li><a href="http://www.<?php print($reg_conselho['Link']); ?>/" target="_blank"><?php print($reg_conselho['Descricao']); ?></a></li>
    <?php
	}
    }
    ?>
</ul>

<h3>Outros</h3>
<ul>
    <?php
    while($reg_outro = mysql_fetch_array($res_outro)){
	if($reg_outro['Tipo'] == '3'){
    ?>
	    <li><a href="http://www.<?php print($reg_outro['Link']); ?>/" target="_blank"><?php print($reg_outro['Descricao']); ?></a></li>
    <?php
	}
    }
    ?>
</ul>