      <?php
      session_start();
      require_once "../lib/util.class.php";
      ?>
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1><?php echo $_SESSION['nomeAluno']; ?></h1>
        <p>Um local que o IPECON oferece aos alunos para interagir com os seus alunos.</p>        
      </div>

      <!-- Example row of columns -->
      <?php
      require_once "class/aviso.class.php";
      $avisoDAO = new Aviso();
      $param['numLimite'] = 5;
      $listaAvisos = $avisoDAO->pesquisar($bd,$param);
      unset($param);

      if (is_array($listaAvisos)) {
        foreach ($listaAvisos as $value) {
          echo "<div class=\"alert alert-success ver-aviso\" id=\"aviso".$value['Codg_Aviso']."\">";
          echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>";
          echo "<strong>".$value['Titulo']."</strong><br>";
          echo $value['Descricao'];
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
              <i class="icon-circle-arrow-right"></i>&nbsp;<a href="#" onClick="verAviso(<?php echo $value['Codg_Aviso'] ?>)"><?php echo utf8_encode($value['Titulo']); ?></a>&nbsp;-&nbsp;<small><?php echo $value['Data']; ?></small><br>
          <?php 
            }
          ?>
          <p><a class="btn" href="home.php?pag=avisos&arq=index.php">Mais avisos &raquo;</a></p>
          <?php
          } 
          ?>
        </div>
        <div class="span4">
          <h2>Vagas</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">Mais vagas &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Cronograma</h2>
          <?php
          require_once "class/cronograma.class.php";
          $cronogramaDAO = new Cronograma();
          $param['turma'] = $_SESSION['turma'];
          $rsCronograma = $cronogramaDAO->pesquisar($bd,$param);
          unset($param);

          if(!is_array($rsCronograma)){ 
            echo "<p class=\"error\">Nenhum data para este mês.</p>";
          }else{ 
            foreach ($rsCronograma as $value) {
              //if(date('Ym') == Util::getAno($value['Data_1']).Util::getMes($value['Data_1'])){
              if('200510' == Util::getAno($value['Data_1']).Util::getMes($value['Data_1']) || 
                 '200510' == Util::getAno($value['Data_2']).Util::getMes($value['Data_2']) ||
                 '200510' == Util::getAno($value['Data_3']).Util::getMes($value['Data_3']) ||
                 '200510' == Util::getAno($value['Data_4']).Util::getMes($value['Data_4']) ||
                 '200510' == Util::getAno($value['Data_5']).Util::getMes($value['Data_5']) ||
                 '200510' == Util::getAno($value['Data_6']).Util::getMes($value['Data_6'])){

                $data1 = ($value['Data_1'] != '--') ? $value['Data_1'].'&nbsp;-&nbsp;' : '';
                $data2 = ($value['Data_2'] != '--') ? $value['Data_2'].'&nbsp;-&nbsp;' : '';
                $data3 = ($value['Data_3'] != '--') ? $value['Data_3'].'&nbsp;-&nbsp;' : '';
                $data4 = ($value['Data_4'] != '--') ? $value['Data_4'].'&nbsp;-&nbsp;' : '';
                $data5 = ($value['Data_5'] != '--') ? $value['Data_5'].'&nbsp;-&nbsp;' : '';
                $data6 = ($value['Data_6'] != '--') ? $value['Data_6'] : '';
          ?>
              <i class="icon-circle-arrow-right"></i>&nbsp;<?php echo utf8_encode($value['Disciplina']); ?><br>Data(s):&nbsp;<?php echo $data1.$data2.$data3.$data4.$data5.$data6; ?><br>
          <?php
              }
              // echo Util::getMes($value['Data_1'])."<br>";
              // echo Util::getAno($value['Data_1'])."<br>";
            }
            echo "<p><a class=\"btn\" href=\"home.php?pag=cronograma&arq=index.php\">Mais cronogramas &raquo;</a></p>";
          } 
          ?>
        </div>
      </div>