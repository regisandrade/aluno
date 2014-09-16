<?php
session_start();
$_SESSION['turma']     = "GAO 003";
$_SESSION['nomeCurso'] = "MBA Gestao e Analise Organizacional";
$_SESSION['idCurso']   = "19";
$_SESSION['idNumero']  = "01406070130";
$_SESSION['nomeAluno'] = "Suelen de Sousa Rezende Pontes";
$_SESSION['ano']       = 2013;

require_once("lib/util.class.php");
require_once("lib/config.php");
require_once "lib/myDB.class.php";

if (isset($_REQUEST['pag']) && $_REQUEST['pag'] == 'bcoOportunidade') {
  $param['sistema'] = 'bcoOportunidade';
} else {
  $param['sistema'] = 'ipecon';
}
$bd = myDB::getInstance($param);
unset($param);
//$util = new Util();
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

    <script src="bootstrap/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
      $(function() {
        
        $('#dataNascimento').datepicker();
        $('#dataExpedicaoRg').datepicker();
        $('#dataPisPasep').datepicker();
        $('#vencimentoHabilitacao').datepicker();
        $('#dataAdmissao_1').datepicker();
        $('#dataDemissao_1').datepicker();
        $('#dataAdmissao_2').datepicker();
        $('#dataDemissao_2').datepicker();
        
      });
    </script>

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/datepicker.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      canvas {
        -ms-touch-action: double-tap-zoom;
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
            <span class="icon-bar">[L]</span>
            <span class="icon-bar">[T]</span>
            <span class="icon-bar">[F]</span>
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
        <p>&copy; IPECON 2014</p>
      </footer>

    </div> <!-- /container -->
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
