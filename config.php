<?php
# ---------------------------------------------------------------- #
# Script:        config.php
# Description:   configuracoes do banco de dados
# Written by	 vanderson.lima
# Date:			 12.01.2020
#            	 Grupo Vicoa Brasil
# ---------------------------------------------------------------- #
$servername = "xx.xxx.xx.xxx";
$username = "user";
$password = "pass";
$dbname = "base";

#CRIA A STRING DE CONEXAO
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
#VERIFICA SE A CONEXAO DEU CERTO
if($conn === false){
    die("ERROR: Conection Refused. " . mysqli_connect_error());
}
?>
