<?php 
//arquivo de conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_sitephp";

$link = mysqli_connect($host,$user,$pass,$db);

/*$banco = mysqli_connect_errno();
if($banco == true){
    echo "Erro na conexão";
}else{
    echo "Conexão OK!";
} */


?>