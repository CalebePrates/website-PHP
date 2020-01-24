<?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

include 'funcoes.php';
$conexao = conecta();


if (isset($_POST['registrar'])) {
    $nome    = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email   = $_POST['email'];
    $senha   = $_POST['senha'];
    $c_senha = $_POST['c_senha'];

	//Verificando se conexão com banco de dados obteve sucesso
	if ($conexao) {

		//Validação dos dados
		$erro     = false;
		$msg_erro = "";

		//Verificando se todos os campos foram preenchidos.
		if ($nome == "" || $apelido == "" || $email == "" || $senha == "") {
			$erro = true;
			meuAlert("Por favor, preencha todos os campos.");
		}else {

			//Validando email
			if($email != "" || $email != null){
			$emailValido = true;
			$posArroba = strrpos($email, "@");
			if ($posArroba === false) {
				$emailValido = false;
			} else if ($email[$posArroba - 1] === false) {
				$emailValido = false;
			}
			$posPonto = strrpos($email, ".");
			if ($posPonto === false) {
				$emailValido = false;
			} else if ($email[$posPonto - 1] == '@'){
				$emailValido = false;
			} else if ($email[$posPonto + 1] === false){
				$emailValido = false;
			}
			} else {
			$emailValido = false;
			}
			if($emailValido == false){
				$erro = true;
				$msg_erro .= "\\nInsira um email com servidor válido!";
			}

			//Validando senha e contra-senha
			if ($senha != $c_senha) {
				$erro = true;
				$msg_erro .= "\\nAs senhas não são iguais.";
			}

			//Validação de erros
			if($erro == true){
				meuAlert($msg_erro);
			} else {
                //Verificando se o email está cadastrado
				$texto_sql = "select * from user where email = '$email'";
				$resultadoEmail = mysqli_query($conexao, $texto_sql);
				$registrosEmail = mysqli_num_rows($resultadoEmail);
				if($registrosEmail > 0){
					meuAlert("O e-mail inserido já está cadastrado.");
				}else {
					$texto_sql = "insert into user (nome, apelido, email, senha, tipo)
								  values ('$nome', '$apelido', '$email', '$senha', 'usuario')";
					$resultado = mysqli_query($conexao, $texto_sql);

					if ($resultado) {
						meuAlert("Usuário cadastrado com sucesso!");
					} else {
						meuAlert("Houve um erro desconhecido. Tente novamente mais tarde.");
					}
				}
			}

		}

	} else {
		meuAlert("Não foi possível realizar o cadastro. Erro na conexão com o banco de dados.");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: 'Roboto-light', sans-serif;
    background-color: white;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container 
{
    padding: 16px;
    background-color: white;
    text-align: center;

}

/* Full-width input fields */
input[type=text], input[type=password] 
{
    width: 400px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: block;
    border: none;
    background: #AB4957;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
}

input[type=text]:focus, input[type=password]:focus 
{
    background-color: #AB4957;
    outline: none;
    position: relative;
    margin-right: auto;
    margin-left: auto;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #DF4957;
    color: white;
    padding: 16px 20px;
    border: none;
    width: 400px;
    margin-left: auto;
    margin-right: auto;
    position: center;
    border-radius: 10px;

}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: #DF4957;
}

 Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<form action="reg.php" method="post">
  <div class="container">
    <h1><center>Registro</center></h1>
    <p><center>Criar conta!</center></p>
    <hr>

    <label for="nome"><b><center>Nome</center></b></label>
    <input type="text" placeholder="Nome" name="nome" required>

    <label for="apelido"><b><center>Apelido</center></b></label>
    <input type="text" placeholder="Apelido" name="apelido" required>

    <label for="email"><b><center>Email</center></b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="psw"><b><center>Senha</center></b></label>
    <input type="password" placeholder="Senha" name="senha" required>

    <label for="psw-repeat"><b><center>Confirmar Senha</center></b></label>
    <input type="password" placeholder="Confirmar Senha" name="c_senha" required>

    <button type="submit" class="registerbtn" name="registrar">Registrar</button>

    <p><center>Ler termos de compromisso <a href="#">Termos e privacidade</a>.</center></p>
    <hr>
  </div>
  
  <div class="container signin">
    <p>Já tem conta? <a href="login.php">Logar</a>.</p>
  </div>
</form>

</body>
</html>
