<?php

session_start();


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
    <section class="templateux-hero">
      <div class="container">
        <div class="row align-items-center justify-content-center intro">
          <div class="col-md-10" data-aos="fade-up">
            <h1>PhotoDare. Compartilhe sua foto de hoje com o mundo!</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="templateux-portfolio-overlap" id="next">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up">
            <a class="project animsition-link" href="log.php">
              <figure>
                <h2><center>Já tem uma conta? Faça log in para postar uma imagem.</center></h2>
              </figure>
              <div class="project-hover">
                <div class="project-hover-inner">
                  <h2>Log in</h2>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a class="project animsition-link" href="reg.php">
              <figure>
                <h2><center>Ainda não se cadastrou? O que está esperando?</center></h2>
              </figure>
              <div class="project-hover">
                <div class="project-hover-inner">
                  <h2>Cadastre-se</h2>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- END row -->
      </div>
    </section>

   
    <!-- END section -->
    <section class="templateux-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4" data-aos="fade-up">
            <h2 class="section-heading mt-3">Como o site funciona.</h2>
          </div>
          <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-5">Todo dia um novo tema para você tirar foto!</h2>
              </div>
            </div>
            

            <div class="row  pt-sm-0 pt-md-5 mb-5">

              <div class="col-lg-6">
                <div class="media templateux-media mb-4">
                  <div class="mr-4 icon">
                    <span class="icon-monitor display-3"></span>
                  </div>
                  <div class="media-body">
                    <h3 class="h5">Criar Conta</h3>
                    <p>Meio que precisamos de algumas informações sobre você para que você sempre possa logar.<br> É simples e rápido, eu prometo.</br></p>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="media templateux-media mb-4">
                  <div class="mr-4 icon">
                    <span class="icon-command display-3"></span>
                  </div>
                  <div class="media-body">
                    <h3 class="h5">Fazendo seu perfil.</h3>
                    <p>Organize seu perfil para que todos possam vem o quão "High-fashion", bem, ou o quão não é.</p>
                  </div>
                </div>
              </div>

            </div>
            <!-- END row -->
            <div class="row clearfix">
              <div class="col-lg-6">
                <div class="media templateux-media mb-4">
                  <div class="mr-4 icon">
                    <span class="icon-camera display-3"></span>
                  </div>
                  <div class="media-body">
                    <h3 class="h5">Tirando uma foto.</h3>
                    <p>Use sua criatividade, para mostrar o seu ponto de vista do tema de cada dia.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                
                <div class="media templateux-media mb-4">
                  <div class="mr-4 icon">
                    <span class="icon-shopping-cart display-3"></span>
                  </div>
                  <div class="media-body">
                    <h3 class="h5">Postar</h3>
                    <p>Feliz com seus resultados? faça o "upload" da foto. E as pessoas diram o que acharam da foto.</p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="templateux-section mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4" data-aos="fade-up">
            <h2 class="section-heading mt-3">Foto de Hoje!</h2>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg-12">
                <a class="post animsition-link" data-aos="fade-up" data-aos-delay="100">
                  <figure>
                    <img src="images/img_1.jpg" alt="Free Template" class="img-fluid">  
                  </figure>
                  <div class="post-hover">
                    <div class="post-hover-inner">
                      <h2>INFORMAÇÕES</h2>
                      <span>AUTOR</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <a class="post animsition-link" data-aos="fade-up" data-aos-delay="200">
                  <figure>
                    <img src="images/img_4.jpg" alt="Free Template" class="img-fluid">  
                  </figure>
                  <div class="post-hover">
                    <div class="post-hover-inner">
                      <h2>INFORMAÇÕES</h2>
                      <span>AUTOR</span>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-6">
                <a class="post animsition-link" data-aos="fade-up" data-aos-delay="300">
                  <figure>
                    <img src="images/img_5.jpg" alt="Free Template" class="img-fluid">  
                  </figure>
                  <div class="post-hover">
                    <div class="post-hover-inner">
                      <h2>INFORMAÇÕES</h2>
                      <span>AUTOR</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="400">
          <div class="col-md-8 ml-auto">
            <a href="log.php" class="animsition-link">Logue para ver seu Feed!</a>
          </div>
        </div>
      </div>
    </section>

    <a class="templateux-section templateux-cta animsition-link mt-5" data-aos="fade-up">
      <div class="container-fluid">
        <div class="cta-inner">
          <h2><span class="words-1">O desafio de hoje é...</span> <span class="words-2">Flores</span></h2>
        </div>
      </div>
    </a>

  <footer class="templateux-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 text-md-left text-center">
            <p>
            <a rel="license" href="http://creativecommons.org/licenses/by/3.0/br/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/3.0/br/80x15.png" /></a>  Brenda de Oliveira Pereira 
          </p>
          </div>
          <div class="col-md-6 text-md-right text-center footer-social">
            <h5>Ama esse site você também pode nos seguir aqui:</h5>
            <a href="https://www.facebook.com/" class="p-3"><span class="icon-facebook2"></span></a>
            <a href="https://twitter.com/" class="p-3"><span class="icon-twitter2"></span></a>
            <a href="https://www.instagram.com/?hl=pt-br" class="p-3"><span class="icon-camera"></span></a>
          </div>
        </div>
      </div>
    </footer>

  </div>

  
  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>
  
  </body>
</html>