<?php
function __autoload($nomeClasse){

    //Verifica se existe a classe no diretório classes
    if(file_exists("class/".$nomeClasse.".class.php")){
        //Se existe carrega
        include_once("class/".$nomeClasse.".class.php");
    }else{
    	echo "O arquivo: class/".$nomeClasse.".class.php não existe";
    }
    
}