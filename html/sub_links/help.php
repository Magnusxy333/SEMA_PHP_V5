<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEMA</title>
    <link rel="stylesheet" href="styles/mobile.css" />
    <link rel="stylesheet" href="../../css/help-styles.css" />
    <link rel="icon" href="images/icon-site.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
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

        <a class="areas-text" href="location.html">
          <i class="fas fa-map-marker-alt"> </i>
          LOCALIZAÇÃO
        </a>

        <a class="areas-text" href="orientations.html">
          <i class="fas fa-book-open"> </i>
          ORIENTAÇÕES
        </a>

        <a class="areas-text" href="contacts.html">
          <i class="fas fa-phone-alt"></i>
          CONTATOS
        </a>

        <a class="areas-text" href="login.html">
          <i class="fas fa-sign-in-alt" id="login-size"></i>
        </a>
      </div>
    </div>

    <!---------------------------------->

    <div class="main-help">
      <div class="top-bottom">
        <div class="align-center">
          <h1 class="main-title">Por que Doar para o SEMA?</h1>

          <p>
            O <b>SEMA (Sistema de Emergencial Mauá)</b> é mais do que um site é
            uma ponte vital entre pessoas em situação de risco e os recursos
          </p>

          <p>
            que podem salvar vidas. Ao doar, você se torna parte dessa rede de
            proteção.
          </p>

          <h2 class="main-title">Como Doar?</h2>
          <p>
            Copie o código pix ou escaneie o QR code abaixo. Qualquer valor
            transforma realidades.
          </p>

          <div class="pix-code">
            <br />
            <img id="pix-qrcode" src="../../images/pix.png" alt="Qr code PIX" />
            <br />
          </div>
          <div class="content-pix">
            <button class="botao-pix">
              <span id="code"> 0ff5feeb-ba87-48de-b21a-954cb9357272 </span>
            </button>
          </div>
          <p class="epigrafe-help">
            <i>
              "Sua generosidade não é um gasto — é um legado de segurança e
              esperança."
            </i>
          </p>
        </div>
      </div>
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

    <!---------------------------->
    <script>
      document.getElementById("code").addEventListener("click", async () => {
        const text = "0ff5feeb-ba87-48de-b21a-954cb9357272";
        try {
          await navigator.clipboard.writeText(text);
          alert("Código pix copiado!");
        } catch (err) {
          console.error("Falha ao copiar: ", err);
        }
      });
    </script>
  </body>
</html>
