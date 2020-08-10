<?php 
//Arquivo logar.php
include "connect.php";
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email != ""  && $senha != ""){
    //echo "Usuário está logado";
    $sql = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email'");
    $registro = mysqli_num_rows($sql);
    while($line = mysqli_fetch_array($sql)){
        $senha_user = $line['senha'];
    }
    if($registro == true){

    }else{
        echo "Você não possui cadastro. Deseja se cadastrar?";
        echo "<a href='form_cadastro.php'>Cadastre-se</a>";
    }

}else{
    echo "É necessário preencher todos os campos e possuir um cadastro.";
    header('location:login.php?valor=1');
}

?>