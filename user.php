<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

include 'funcoes.php';

$conexao = conecta();

if (isset($_POST['enviar'])) {
    $bio = $_POST['bio'];
    $id = $_SESSION['id'];
    
    if ($conexao) {
        if ($bio == "") {
            meuAlert("Preencha o formulário.");
        } else {
        
            $sql = "update user set bio = '$bio' where id = '$id'";
            $resultado = mysqli_query($conexao, $sql);
            if ($resultado) {
                meuAlert("Biografia cadastrada com sucesso.");
            } else {
                meuAlert("Houve um erro, tente novamente mais tarde.");
            }
            
        }
        
    } else {
        meuAlert("Houve um erro, tente novamente mais tarde.");
    }
}
if(isset($_POST['cadastrar'])){
  $foto = $_FILES['foto'];
  $nomeFoto = $foto['name'];
  $dir = "imagens/";
  
  if(move_uploaded_file($foto['tmp_name'],$dir.$nomeFoto) ){
    ?>
    <script type="text/javascript">alert('Foto atualizada com sucesso')</script>
    <?php
  }
  else{
    print_r(error_get_last());    
  }

  $insertItens = mysqli_query($conexao,"UPDATE user SET imagem = '$nomeFoto'") or die(mysqli_error($conexao));
}
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
                <li><a href="feed.php" class="animsition-link">Feed</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li><a href="user.php" class="animsition-link"><?php echo $_SESSION['apelido']; ?></a></li>
                    <li><a href="logout.php" class="animsition-link">Sair</a></li>
                <?php
                } else {
                ?>
                    <li><a href="reg.php" class="animsition-link">Cadastro</a></li>
                    <li><a href="login.php" class="animsition-link">Login</a></li>                
                <?php
                }
                ?>
              </ul>
            </nav>      
          </div>
        </div>
      </div>
    </header>

    <!-- END templateux-navbar -->
    <section class="templateux-hero"  data-scrollax-parent="true">
      <!-- <div class="cover" data-scrollax="properties: { translateY: '30%' }"><img src="images/hero_2.jpg" /></div> -->

      <div class="container">
        <div class="row align-items-center justify-content-center intro">
          <div class="col-md-10" data-aos="fade-up">
            <h1><?php echo $_SESSION['nome']." (".$_SESSION['apelido'].")"; ?></h1>
            <p class="lead">Biográfia do Usuário</p>
            <a href="#next" class="go-down js-smoothscroll"></a>
          </div>
        </div>
      </div>
    </section>
    <!-- END templateux-hero -->
    
    
    <section class="templateux-portfolio-overlap mb-5" id="next">
        <form style="max-width: 500px; margin: 0 auto;" action="user.php" method="post">
            <textarea name="bio" style="width: 100%; border-radius: 10px; resize: none;" placeholder="Escreva uma biografia (200 caracteres)." maxlength="200"></textarea>
            <br><br>
            <center><input name="enviar" style="background-color: pink; border: none; border-radius: 10px;" type="submit" value="Enviar"></center>
            <br><br>
        </form>
        <form enctype="multipart/form-data" method="POST">
        <center><label for="foto">Foto:</label><br>
            SÓ É PERMITIDO FOTOS ATÉ 300KB<br>
            <input type="file" id="foto" name="foto" value="" required><br><br></center>
            <center><input type="submit" name="cadastrar" value="Cadastrar uma Imagem" style="background-color: pink; border: none; border-radius: 10px;"></center>
        </form>
    </section>

<footer class="templateux-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 text-md-left text-center">
            <p>
            <a rel="license" href="http://creativecommons.org/licenses/by/3.0/br/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/3.0/br/80x15.png" /></a>  Brenda de Oliveira Pereira 
          </p>
          </div>
          <div class="col-md-6 text-md-right text-center footer-social">
            <h5>Ama esse site você tabém pode nos seguir aqui:</h5>
            <a href="https://www.facebook.com/" class="p-3"><span class="icon-facebook2"></span></a>
            <a href="https://twitter.com/" class="p-3"><span class="icon-twitter2"></span></a>
            <a href="https://www.instagram.com/?hl=pt-br" class="p-3"><span class="icon-instagram"></span></a>
          </div>
        </div>
      </div>
    </footer>

  </div>

  
  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>
  
  </body>
</html>