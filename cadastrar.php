<?php 
//arquivo de cadastro
//Incluindo o arquivo de conexão
include "connect.php";


//variáveis pegando valores do formulário de cadastro
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$resenha = $_POST['repetesenha'];
$lembrete = $_POST['lembrete'];
/*$foto = $_FILES['foto'] ['name'];
$tipo = $_FILES['foto'] ['type'];*/


//variável registro que será usada para ver se usuário esta ou não habilitado a fazer o cadastro
$registro = false;
if($nome != "" && $email != "" && $senha != "" && $lembrete != ""){
    if($senha != $resenha){
        echo "<script>alert('Senhas diferentes');window.history.go(-1);</script>";
    }else {
        //habilitando p usuário para o cadastro
        $registro = true;
    }
}else {
    echo "<script>alert('É necessário preencher todos os campos');window.history.go(-1);</script>";
}


//fazendo uma consulta para pegar o id do usuario
$sql = mysqli_query($link,"SELECT * FROM tb_user order by id_user desc limit 1");
while($line = mysqli_fetch_array($sql)){
    $id = $line['id_user'];
    $email_user = $line['email'];
}

$id = $id + 1;
$pasta = "user".$id;//sempre vai ter um id acima do último registrado


//Verificando se a pasta existe
if(file_exists("user/".$pasta)){
    //echo "<script>alert('A pasta já existe!');</script>";
    //rmdir($pasta);
}else{
    mkdir("user/".$pasta,0777); //criar pasta
    //echo "<script>alert('A pasta ".$pasta." foi criada com sucesso!');</script>";   
}



//Método da substituição tem que vim antes do upload das imagens
//Verificando os formatos permitidos para upload
/*$formatos = array(1=>'image/png',2=>'image/jpg',3=>'image/jpeg',4=>'image/gif');
$teste = array_search($tipo,$formatos);
if($teste == true){
    move_uploaded_file($_FILES['foto']['tmp_name'],"user/".$pasta."/".$foto);
}else{
    echo "<script>alert('Tipo de arquivo não suportado!');</script>";
}

$foto = str_replace(" ","_",$foto);
$foto = str_replace("-","_",$foto);
$foto = str_replace("%","_",$foto);
$foto = str_replace("&","_",$foto);
$foto = str_replace("#","_",$foto);
$foto = str_replace("$","_",$foto);
$foto = str_replace("á","a",$foto);
$foto = str_replace("à","a",$foto);
$foto = str_replace("ã","a",$foto);
$foto = str_replace("â","a",$foto);
$foto = str_replace("ä","a",$foto);
$foto = str_replace("Á","a",$foto);
$foto = str_replace("À","a",$foto);
$foto = str_replace("Â","a",$foto);
$foto = str_replace("Ä","a",$foto);
$foto = str_replace("Ã","a",$foto);
$foto = str_replace("é","e",$foto);
$foto = str_replace("è","e",$foto);
$foto = str_replace("É","e",$foto);
$foto = str_replace("È","e",$foto);
$foto = str_replace("í","i",$foto);
$foto = str_replace("ì","i",$foto);
$foto = str_replace("Í","i",$foto);
$foto = str_replace("Ì","i",$foto);
$foto = str_replace("ó","o",$foto);
$foto = str_replace("ò","o",$foto);
$foto = str_replace("õ","o",$foto);
$foto = str_replace("ô","o",$foto);
$foto = str_replace("Ó","o",$foto);
$foto = str_replace("Ò","o",$foto);
$foto = str_replace("Ô","o",$foto);
$foto = str_replace("Õ","o",$foto);
$foto = str_replace("ú","u",$foto);
$foto = str_replace("ù","u",$foto);
$foto = str_replace("Ú","u",$foto);
$foto = str_replace("Ù","u",$foto);
$foto = str_replace("ç","c",$foto);
$foto = str_replace("Ç","c",$foto);
//passando texto da variavel para minúscula
$foto = strtolower($foto);
*/


//pegando data e hora do computador
date_default_timezone_set('America/Sao_Paulo');
$dt = date('Y-m-d');
$hr = date('H:i:s');


//cadastrando o novo usuário e direcionando ele para a tela principal
if($registro == true && $email != $email_user){
    mysqli_query($link,"INSERT INTO tb_user (nome,email,senha,lembrete,nivel,dt,hr) VALUES ('$nome',
'$email','$senha','$lembrete',5,'$dt','$hr')");
    //echo "<script>alert('Usuário cadastrado com sucesso!');window.location.href='index.php';</script>";
    echo "<p style='text-align:center;color:#333;padding:5px;'>Usuário cadastrado com sucesso!<br>";
    echo "<a href='index.php' style='color:#59f'>Ir para home </a>
    | <a href='login.php' style='color:59f'>Login</a>";
    echo "</p>";
}else{
    echo "<script>window.history.go(-1);</script>";
}




?>