<?php
require_once "../lib/Menu.class.php";
$menu = new Menu();

echo "<a class=\"brand\" href=\"home.php\">IPECON - Área do aluno</a>\n
<div class=\"nav-collapse collapse\">\n
\t<ul class=\"nav\">\n";
$conta = 1;

foreach($menu->menuIpeconAreaAluno() as $linha){
  if($linha[0]){
    
    if (!empty($linha[2]) && $linha[2] == 'fixo') {
      $active = (empty($_GET['pag']) ? ' class="active"' : '');
      echo "\t\t<li".$active."><a href=\"".$linha[1]."\">".$linha[0]."</a>";
    }else{
      echo "\t\t<li class=\"dropdown\">\n
      \t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">".$linha[0]." <b class=\"caret\"></b></a>\n";
      if(is_array($linha[1])){
        echo "\t\t\t<ul class=\"dropdown-menu\">\n";
        foreach($linha[1] as $linhaSub){
          echo "\t\t\t\t<li><a href=\"".$linhaSub[1]."\"".(!empty($linhaSub[2]) ? $linhaSub[2] : '').">".$linhaSub[0]."</a></li>\n";
        }
        echo "\t\t\t</ul>\n";
      }

    }

    echo "\t\t</li>\n";
  }

}
echo "\t</ul>\n
</div>";