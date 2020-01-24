 <?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

include 'funcoes.php';

$conexao = conecta();

if (isset($_POST['logar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    //Verificando se conexão com banco de dados obteve sucesso
        if ($conexao) {
            //Verificando se todos os campos foram preenchidos.
            if ($email == "" || $senha == "") {
                meuAlert("Por favor, preencha todos os campos.");
            } else {

                $sql = "select * from user where email = '$email' and senha = '$senha'";
                $resultado = mysqli_query($conexao, $sql);
                $linha = mysqli_num_rows($resultado);

                //Verificando se os dados existem na tabela
                if ($linha > 0) {
                    $dados = mysqli_fetch_array($resultado);
                    
                    $_SESSION['nome'] = $dados['nome'];
                    $_SESSION['apelido'] = $dados['apelido'];
                    $_SESSION['email'] = $dados['email'];
                    $_SESSION['tipo'] = $dados['tipo'];
                    $_SESSION['id'] = $dados['id'];
                    header('Location: index.php');
                    exit;
                } else {
                    meuAlert('Dados incorretos!');
                }
            }
        } else {
            meuAlert('Erro inesperado. Tente novamente mais tarde.');
        }
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    background-color: white;
    font-family: 'Roboto-light', sans-serif;
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

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<form action="login.php" method="post">
  <div class="container">
    <h1><center>Login</center></h1>
    <p><center></center></p>
    <hr>

    <label for="email"><b><center>Email</center></b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="psw"><b><center>Senha</center></b></label>
    <input type="password" placeholder="Senha" name="senha" required>

    <button type="submit" class="registerbtn" name="logar">Logar</button>
    <hr>
  </div>
</form>

</body>
</html>
