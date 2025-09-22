<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMA</title>
    <link rel="stylesheet" href="styles/mobile.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../images/icon-site.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  </head>
  <body>
          
    <?php
    // Inicie a sessão no início da página
    session_start();
    ?>

    <div class="header">

      <div class="left">
        <a href="index.php">
          <img class="icon" src="../images/sema.png" alt="icon">
        </a>
      </div>

      <div class="right">

          <a class="areas-text" href="../index.php">
            <i class="fas fa-house-user" ></i>
            HOME
          </a>

          <a class="areas-text" href="location.php">
            <i class="fas fa-map-marker-alt" > </i>
            LOCALIZAÇÃO
          </a>

          <a class="areas-text" href="orientations.php">
            <i class="fas fa-book-open" > </i>
            ORIENTAÇÕES
          </a>

          <a class="areas-text" href="contacts.php">
            <i class="fas fa-phone-alt" ></i>
            CONTATOS
          </a>

          <a class="areas-text" href="login.php">
            <i class='fas fa-sign-in-alt' id="login-size"></i>
          </a>

      </div>
  
    </div> 
  
    <!---------------------------------->

    <div class="main">

      <form name="form2" method="post">
        <fieldset>
          <div id="login" class="contect-login">  
      
        <h1 class="title-login">
          Login
        </h1>
        

        <div class="login-countainer">
       
          <div class="login-coloum">
           
          <div class="box">
           
            <div class="coloum-login" ></div>
 
            <h1 class="login-title">bem-vindo!</h1>
              <p class="login-text">Usuário</p>
              
              <input type="text" id="input" name="txt_username" placeholder="Digite o seu usuário"><br>
              
              <p class="login-text">Senha</p>
              
              <input class="input2" type="password" name="txt_password" id="senha" placeholder="Digite a sua senha">
              <img   id="olho" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="
              /> <br>
              <a href="sub_links/new_password.html" class="login-link">Esqueceu sua senha?</a>
              <button class="login-button" TYPE="submit" name="bt_incluir" VALUE="LOGAR" onClick="document.form2.action='../singIn.php'">ENTRAR</button>
            </div>
 
              <div class="box-resgister">
              <div class="align-register">
                <p>Ainda não é cadastrado?</p>
              </div>
 
              <div class="align-register2">
                <a class="link2" href="sub_links/register.php">Cadastre-se aqui</a>
              </div>
             
          </div>
 
          <P class="text-log">
            *Com o cadastro você recebe atualizações imediatas <br>
          </P>
          <p class="text-log">
            do nosso projeto!
          </p>    
       
        </div>
      </div>
 
      </div>
        </fieldset>
      </form>

      

    </div>

   <!---------------------------------->
  
    <div class="footer">
           
      <div class="staff-information">
        <p>Ainda não nos conhece?</p>
        <a class="central-link" href="sub_links/about_us.html">sobre nós</a>
      </div>

      <div class="social_midias">
        <p class="staff-information">Nossas redes sociais</p>

        <div class="icons">
          
          <a href="https://www.instagram.com/elobos.acolhe?igsh=ZDE5N2F5ODVoY2pj">
            <img id="images" src="../images/icons/INSTA.webp" alt="">
          </a>

          <a href="https://x.com/ellobos675443">
            <img id="images" src="../images/icons/xTWT.avif" alt="">
          </a>

          <a href="https://www.youtube.com/@ellobos-n8n">
            <img id="images2" src="../images/icons/YOUYOU2.png" alt="">      
          </a>

        </div>
      </div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/login.js"></script>
  </body>
</html>

