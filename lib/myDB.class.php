<?php
/**
*
* CLASSE DE CONEXAO COM BANCO DE DADOS
*
* @author Regis Andrade
* @return PDO
*/

class myDB extends PDO{

	public $persistent = false;
	private static $instancia;

	public function myDB($parametros){
		// verifico a persistência da conexao
		if( $parametros['persistent'] != false){ 
			$this->persistent = true; 
		}

		parent::__construct($parametros['dsn'], $parametros['username'], $parametros['password'], 
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				  PDO::ATTR_PERSISTENT => $this->persistent));
	}

	public static function getInstance($param) {
        try {
            if ($param['sistema'] == 'bcoOportunidade') {
                $parametros['dsn'] = "mysql:host=localhost;dbname=ipecon1_oportunidade";
        		$parametros['username'] = "ipecon1_oportu";
        		$parametros['password'] = "nich1504!!";
			} elseif($param['sistema'] == 'ipecon') {
        		$parametros['dsn'] = "mysql:host=localhost;dbname=ipecon1_ipecon";
        		$parametros['username'] = "ipecon1_ipecon";
        		$parametros['password'] = "nich1504";
            }
            $parametros['persistent'] = true;
            return self::$instancia = new myDB($parametros);
        } catch ( PDOException $e ) {
            echo "Erro ao conectar no sistema: ".$param['sistema'].". Erro:".$e->getMessage();
            exit ();
        }

        // Se já existe instancia na memória eu retorno ela
        //return self::$instancia;
    }
}
?>