      <?php
      session_start();
      echo "<pre>";
      print_r($_SESSION);
      echo "</pre>";
      //require_once "lib/util.class.php";
      ?>
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1><?php echo $_SESSION['nomeAluno']; ?></h1>
        <p class="text-info"><small>Curso: <?php echo $_SESSION['nomeCurso'].' - '.$_SESSION['turma']; ?></small></p>
      </div>

      <!-- Example row of columns -->
      <?php
      $avisoDAO = new Aviso();
      $param['numLimite'] = 5;
      $listaAvisos = $avisoDAO->pesquisar($bd,$param);
      unset($param);

      if (is_array($listaAvisos)) {
        foreach ($listaAvisos as $value) {
          echo "<div class=\"alert alert-block ver-aviso\" id=\"aviso".$value['CodigoAviso']."\">\n";
          echo "\t<a class=\"close\" data-hide=\"alert\">×</a>\n";
          echo "\t<strong>".utf8_encode($value['Titulo'])."</strong><br>";
          echo nl2br($value['Descricao']);
          echo "</div>";
          echo "<br>";
        }
      }
      ?>
      <div class="row">
        <div class="span4">
          <h2>Avisos</h2>
          <?php 
          if(!is_array($listaAvisos)){ 
          ?>
          <p class="error">Nenhum aviso cadastrado</p>
          <?php 
          }else{ 
            foreach ($listaAvisos as $value) {
          ?>
              <i class="icon-ok"></i>&nbsp;<a href="#" onClick="verAviso(<?php echo $value['CodigoAviso'] ?>)"><?php echo utf8_encode($value['Titulo']); ?></a>&nbsp;-&nbsp;<small><?php echo $value['Data']; ?></small><br>
          <?php 
            }
          ?>
          <br>
          <p><a class="btn btn-info" href="home.php?pag=avisos&arq=index.php">+ Avisos &raquo;</a></p>
          <?php
          } 
          ?>
        </div>
        <!--
        <div class="span4">
          <h2>Vagas</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">Mais vagas &raquo;</a></p>
        </div>
        -->
        <div class="span4">
          <h2>Cronograma</h2>
          <?php
          $cronogramaDAO = new Cronograma();
          $param['turma'] = $_SESSION['turma'];
          $rsCronograma = $cronogramaDAO->pesquisar($bd,$param);
          unset($param);

          if(!is_array($rsCronograma)){ 
            echo "<p class=\"error\">Nenhum data para este mês.</p>";
          }else{ 
            foreach ($rsCronograma as $value) {
              if(date('Ym') == Util::getAno($value['Data_1']).Util::getMes($value['Data_1'])){
              /*if('200510' == Util::getAno($value['Data_1']).Util::getMes($value['Data_1']) || 
                 '200510' == Util::getAno($value['Data_2']).Util::getMes($value['Data_2']) ||
                 '200510' == Util::getAno($value['Data_3']).Util::getMes($value['Data_3']) ||
                 '200510' == Util::getAno($value['Data_4']).Util::getMes($value['Data_4']) ||
                 '200510' == Util::getAno($value['Data_5']).Util::getMes($value['Data_5']) ||
                 '200510' == Util::getAno($value['Data_6']).Util::getMes($value['Data_6'])){*/

                $calendario[$value['Disciplina']][] = ($value['Data_1'] != '--') ? $value['Data_1'] : '';
                $calendario[$value['Disciplina']][] = ($value['Data_2'] != '--') ? $value['Data_2'] : '';
                $calendario[$value['Disciplina']][] = ($value['Data_3'] != '--') ? $value['Data_3'] : '';
                $calendario[$value['Disciplina']][] = ($value['Data_4'] != '--') ? $value['Data_4'] : '';
                $calendario[$value['Disciplina']][] = ($value['Data_5'] != '--') ? $value['Data_5'] : '';
                $calendario[$value['Disciplina']][] = ($value['Data_6'] != '--') ? $value['Data_6'] : '';
          ?>
              
          <?php
              }
              // echo Util::getMes($value['Data_1'])."<br>";
              // echo Util::getAno($value['Data_1'])."<br>";
            }
		//echo "<pre>";
		//print_r($calendario);
		foreach($calendario as $id => $nome){
			echo '<i class="icon-ok"></i>&nbsp;<strong>'.utf8_encode($id).'</strong> <br>Data(s): ';
			foreach($nome as $chave => $data){
				if($data != ''){
					if($chave > 0){
						echo " - ";
					}
					echo $data;
				}
			}
			echo "<br>";
		}

		echo "</pre>";
		echo "<br><p><a class=\"btn btn-info\" href=\"home.php?pag=cronograma&arq=index.php\">+ Cronogramas &raquo;</a></p>";
          } 
          ?>
        </div>
      </div>
