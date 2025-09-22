<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/register.css" />
    <link rel="icon" href="../../images/icon-site.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <title>SEMA</title>
  </head>
  <body>
    <div class="header">
      <div class="left">
        <a href="../../index.php">
          <img class="icon" src="../../images/sema.png" alt="icon" />
        </a>
      </div>

      <div class="right">
        <a class="areas-text" href="../../index.php">
          <i class="fas fa-house-user"></i>
          HOME
        </a>

        <a class="areas-text" href="../location.php">
          <i class="fas fa-map-marker-alt"> </i>
          LOCALIZAÇÃO
        </a>

        <a class="areas-text" href="../orientations.php">
          <i class="fas fa-book-open"> </i>
          ORIENTAÇÕES
        </a>

        <a class="areas-text" href="../contacts.php">
          <i class="fas fa-phone-alt"></i>
          CONTATOS
        </a>

        <a class="areas-text" href="../login.php">
          <i class="fas fa-sign-in-alt" id="login-size"></i>
        </a>
      </div>
    </div>

    <!---------------------------------->

    <div class="main">
      
      <form name="form1" method="post">
        <fieldset>
          <div class="contect-login">
        <div class="login-countainer">
          <div class="login-coloum">
            <div class="box">
              <div class="coloum-login"></div>

              <h1 class="login-title">CADASTRO</h1>

              <p class="login-text">Username</p>

              <input
                type="text js-input-name"
                id="input"
                class="js-input-name"
                placeholder="Digite seu username"
                type="text" 
                name="txt_username"
              /><br />

              <div class="name-lastname">
                <p class="login-text">Nome</p>

                <p class="login-text">Sobrenome</p>

                <input
                  type="text"
                  id="input-name"
                  class="js-input-name2"
                  placeholder="Digite o seu nome"
                  type="text" 
                  name="txt_nome"
                />

                <input
                  type="text"
                  id="input-last-name"
                  class="js-input-name3"
                  placeholder="Digite o seu sobrenome"
                  type="text" 
                  name="txt_sobrenome"
                />
              </div>

              <p class="login-text">Email</p>

              <input
                type="text"
                id="input"
                class="js-input-name4"
                placeholder="Digite o seu Email"
                type="text" 
                name="txt_email"
              /><br />

              <div class="name-lastname">
                <p class="login-text">Senha</p>

                <p class="login-text">Confirmar senha</p>

                <input
                  type="text"
                  id="input-name"
                  class="js-input-name5"
                  placeholder="Digite a sua senha"
                  type="text" 
                  name="txt_password"
                />

                <input
                  type="text"
                  id="input-last-name"
                  class="js-input-name6"
                  placeholder="sua senha novamente"
                  type="text" 
                  name="txt_confirmPassword"
                />
              </div>

              <div class="button-register-division">
                <button class="login-button" onclick="clean();">LIMPAR</button>

                <a href="login.html">
                <button class="login-button-send" TYPE="submit" name="bt_incluir" VALUE="CADASTRAR" onClick="document.form1.action='../../registration.php'">
                  ENVIAR
                </button>
                </a>

              </div>
            </div>
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
        <a class="central-link" href="about_us.html">sobre nós</a>
      </div>

      <div class="social_midias">
        <p class="staff-information">Nossas redes sociais</p>

        <div class="icons">

          <a href="https://www.instagram.com/elobos.acolhe?igsh=ZDE5N2F5ODVoY2pj">
            <img id="images" src="../../images/icons/INSTA.webp" alt="">
          </a>

          <a href="https://x.com/ellobos675443">
            <img id="images" src="../../images/icons/xTWT.avif" alt="">
          </a>

          <a href="https://www.youtube.com/@ellobos-n8n">
            <img id="images2" src="../../images/icons/YOUYOU2.png" alt="">      
          </a>

        </div>
      </div>
    </div>

    <script src="../../js/register.js"></script>
  </body>
</html>
