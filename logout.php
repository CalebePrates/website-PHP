
<?php

session_start();

unset($_SESSION['nome']);
unset($_SESSION['apelido']);
unset($_SESSION['email']);
unset($_SESSION['tipo']);
unset($_SESSION['id']);

//Apagando todos os dados da sessão:
session_unset();
unset($_SESSION);
//Destruindo a sessão:
session_destroy();

header('Location: index.php');
exit;

?>