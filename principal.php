      <?php
      session_start();
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
      ?>
      <div class="alert alert-success">

      </div>
      <?php
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
            //echo "<ul>";
            foreach ($listaAvisos as $value) {
          ?>
              <i class="icon-circle-arrow-right"></i>&nbsp;<a href="#" onClick="verAviso(<?php echo $value['Codg_Aviso'] ?>)"><?php echo utf8_encode($value['Titulo']); ?></a>&nbsp;-&nbsp;<small><?php echo $value['Data']; ?></small><br>
          <?php 
            }
            //echo "</ul>";
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
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">Mais cronogramas &raquo;</a></p>
        </div>
      </div>