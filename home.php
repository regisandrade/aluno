<?php
session_start();
$_SESSION['turma']     = "PJ004";
$_SESSION['nomeCurso'] = "MBA em Perícia Judicial";
$_SESSION['idCurso']   = "1";
$_SESSION['idNumero']  = "36083445191";
$_SESSION['nomeAluno'] = "Ana Marta Rocha";
$_SESSION['ano']       = 2005;

require_once "../lib/myDB.class.php";
$bd = new myDB();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IPECON - Ensino e Consultoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="regisandrade@gmail.com">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    <script src="js/siteAluno.js"></script>

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!-- <link rel="shortcut icon" href="bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php include "menu.php"; ?>
        </div>
      </div>
    </div>

    <div class="container">
    <?php 
      $pagina = null;
      if(isset($_REQUEST['pag'])){
        $pagina = $_REQUEST['pag'] . ($_REQUEST['arq'] ? '/'.$_REQUEST['arq'] : '');
      }else{
        $pagina = "principal.php";
      }
      include_once $pagina; 
    ?>

      <hr>

      <footer>
        <p>&copy; IPECON 2013</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>