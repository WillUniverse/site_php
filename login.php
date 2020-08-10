<html>
	<head>
		<title>Site em PHP</title>
		<link rel="stylesheet" type="text/css" href="css/formato.css">
	</head>
	
	<body>
        <div id="box_form">
            <h1 class="titulos" style="margin-left:10%">Tela de Login</h1> 
            <?php
            @$v = $_GET['valor'];
            if($v){
                echo " - <span style='color:red'>Todos os campos devem ser preenchidos</span>";
            }
            ?>
            <form action="logar.php" method="POST" enctype="multipart/form-data">
                <input type="email" name="email" class="campos_cad" placeholder="E-mail">
                <input type="password" name="senha" class="campos_cad" placeholder="Senha">
                <!--<input type="file" namespace="foto" class="campos_cad">-->
                <div id="botoes">
                    <input type="submit" value="Logar" class="bt_cad">
                    <input type="reset" value="Limpar" class="bt_cad">
                </div>
            </form>
            <div class="botoes">
                <a href="index.php" class="form_link">&larr;Voltar para a página principal</a>
                <p class="p_form">Ainda não possui o cadastro? Então clique no link abaixo para fazer o cadastro.</p>
                <a href="form_cadastro.php" class="form_link">Cadastre-se</a>     
            </div>
        </div>
    </body>
</html>