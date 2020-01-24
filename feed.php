<?php

session_start();

include 'funcoes.php';

$conexao = conecta();

?> 
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PhotoDare &mdash; Compartilhe sua foto de hoje.</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.min.css">
    <link rel="stylesheet" href="css/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/animsition.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" href="css/style.css">
  </head>
  <script>
    function logout() {
        if (confirm("Você deseja sair?")) {
            location.href = "logout.php";
        }
    }

</script>
  <body>
  
  <div class="js-animsition animsition" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">

    <header class="templateux-navbar" data-aos="fade-down">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-3"><div class="site-logo"><a href="index.php" class="animsition-link">PhotoDare</a></div></div>
          <div class="col-sm-9 col-9 text-right">

            <button class="hamburger hamburger--spin toggle-menu ml-auto js-toggle-menu" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>  

            <nav class="templateux-menu js-templateux-menu" role="navigation">
              <ul class="list-unstyled">
                <li class="d-md-none d-block active"><a href="index.php" class="animsition-link">Home</a></li>
                <li><a href="index.php" class="animsition-link">Inicial</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li><a href="user.php" class="animsition-link"><?php echo $_SESSION['apelido']; ?></a></li>
                <?php
                } else {
                ?>
                    <li><a href="reg.php" class="animsition-link">Cadastro</a></li>
                    <li><a href="user.php" class="animsition-link">Login</a></li>                
                <?php
                }
                ?>
              </ul>
            </nav>  
          </div>
        </div>
      </div>
    </header>
    <section class="templateux-hero"  data-scrollax-parent="true">
      <div class="container">
        <div class="row align-items-center justify-content-center intro">
          <div class="col-md-10" data-aos="fade-up">
            <h1>Veja sobre as pessoas que estão postando!</h1>
            <a href="#next" class="go-down js-smoothscroll"></a>
          </div>
        </div>
      </div>
    </section>
    <section class="templateux-portfolio-overlap mb-5" id="next">
        <?php
            if ($conexao) {
            ?>
                <center><table style="font-size: 20px; width: 80%;">
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Biografia
                        </th>
                        <th>
                            Apelido
                        </th>
                        <th>
                            Foto
                        </th>
                    </tr>
                <?php
                    $sql = "select * from user order by id desc";
                    $resultado = mysqli_query($conexao, $sql);
                    $linhas = mysqli_num_rows($resultado);
                    
                    if ($linhas > 0) {
                        while ($dados = mysqli_fetch_array($resultado)) {
                            ?>
                            <tr style="border-bottom: 1px solid pink; border-top: 1px solid pink;">
                                <td>
                                    <?php echo $dados['nome']; ?>
                                </td>
                                <td>
                                    <?php
                                        if ($dados['bio'] === "") {
                                            echo 'Essa pessoa não possui uma biografia.';
                                        } else {
                                            echo $dados['bio'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $dados['apelido']; ?>
                                </td>
                                <td>
                                    <?php $colocar='imagens/'.$dados['imagem'];
                                    echo '<img src=';echo $colocar; echo ' style=\'width: 100px; height: 100px;\'>'; ?>
                                </td>
                            </tr>
                            
                            <?php
                        }
                    } else {
                        ?>
                        <center><h2>Ainda não há biografias.</h2></center>
                        <?php
                    }
                ?>
                </table></center>
            <?php 
            } else {
            ?>
            <center><h2>Hou um erro inesperado!</h2></center>
            <?php
            }
        ?>
    </section>
  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>
  
  </body>
</html>