
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMA</title>
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css//contacts.css">
    <link rel="icon" href="images/icon-site.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body>
           
    <?php
      // Inicie a sessão no início da página
      session_start();
    ?>
           
    <div class="header">
        <div class="left">
            <a href="../index.php">
                <img class="icon" src="../images/sema.png" alt="icon">
            </a>
        </div>

        <div class="right">
            <a class="areas-text" href="../index.php">                    
                <i class="fas fa-house-user"></i>                   
                HOME                     
            </a>

            <a class="areas-text" href="location.php">
                <i class="fas fa-map-marker-alt"></i>
                LOCALIZAÇÃO
            </a>

            <a class="areas-text" href="orientations.php">
                <i class="fas fa-book-open"></i>
                ORIENTAÇÕES
            </a>

            <a class="areas-text" href="contacts.php">
                <i class="fas fa-phone-alt"></i>
                CONTATOS
            </a>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div style="display: flex; flex-direction: column; align-items: center;">
                <a class="areas-text" href="profile.php">
                    <i class="fas fa-user-circle"></i>
                    PERFIL
                </a>
                <a class="areas-text" href="logout.php">
                    SAIR
                </a>
            </div>
            <?php else: ?>
            <a class="areas-text" href="login.php">
                <i class='fas fa-sign-in-alt' id="login-size"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>  

    <!---------------------------------->

    <div class="main-ctt">

      <div class="center">

        <div class="content-contacts"> 
        
    
          <div class="align-title">
            <h1 class="contact-text">
              CONTATOS DE EMERGÊNCIA 
              <i class="fas fa-phone-alt" style="font-size:32px;"> </i>
            </h1>
          </div>


      
          <p class="content-text-description">
            Ter a disposição contatos de emergência é de extrema importância 
            para uma resposta rápida e eficaz em uma situação de risco 
          </p>
          
          <p id="top-margin" class="content-text-description">
            <i>Clique ou pressione em cima do número desejado para copiar!</i>
          </p>

          <div class="numbers-contact">
            <div class="name-number">
              <p>Polícia Militar</p>
              <button id="modern-copy-btn">
              <p> <span id="number-police-mi">190</span></p>
              </button>
            </div>
            
            <div class="name-number">
              <p> Polícia Civil</p>
              <button id="modern-copy-btn">
                <p> <span id="number-police-ci"> 197 </span></p>
              </button>
            </div>
            
            <div class="name-number">
              <p>Defesa Civil</p>
              <button id="modern-copy-btn">
                <p><span id="number-defesa-ci"> 199 </span></p>
              </button>
            </div>
            
            <div class="name-number">
              <p> Polícia Rodoviária  </p>
              <p>Federal</p>
              <button id="modern-copy-btn">
                <p><span id="number-police-ro"> 191</span></p>
              </button>
            </div>
            
            <div class="name-number">             
              <p>SAMU</p>
              <button id="modern-copy-btn">
                <p><span id="number-samu"> 192</span></p>  
              </button>            
            </div>
            
            <div class="name-number">
              <p>Corpo de Bombeiros</p>
              <button id="modern-copy-btn">
                <p><span id="number-bombeiros">193</span></p>
              </button>
            </div>

            </div>

            <div>
              <div class="name-number">
                <p>Central de atendimento </p>
                <p>à Mulher</p>
                <button id="modern-copy-btn">
                  <p><span id="number-mulher">180</span></p>
                </button>
              </div>
            </div>



            <p class="content-text-description">
              Além desses contatos é recomendado sempre 
              a utilização de um número correspondente à 
              alguma pessoa de sua confiança para 
              eventuais contatações de urgência.
            </p>
          </div> 
            
            <div class="content-exemples">
              <ul>
              <b class="exemples-titles">Exemplos:</b>
              <div class="exemples">
                <li> Número de algum responsável (se de menor); </li>
                <li> Número de seu(sua) parceiro(a); </li>
                <li> Número de algum amigo próximo; </li>
                <li> Número de algum parente próximo. </li>
              </div>
              </ul>
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
    
   <!---------------------------------->

    <script>
      document.getElementById("number-police-mi").addEventListener("click", async () => {
          const text = "190";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-police-ci").addEventListener("click", async () => {
          const text = "197";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-bombeiros").addEventListener("click", async () => {
          const text = "193";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-defesa-ci").addEventListener("click", async () => {
          const text = "199";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-police-ro").addEventListener("click", async () => {
          const text = "191";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-samu").addEventListener("click", async () => {
          const text = "192";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });

      document.getElementById("number-mulher").addEventListener("click", async () => {
          const text = "180";
          try {
              await navigator.clipboard.writeText(text);
              alert("Texto copiado com sucesso!");
          } catch (err) {
              console.error("Falha ao copiar: ", err);
          }
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
  </body>
</html>

        <!--          
          <div class = "img-ctt">
            <a href="https://br.freepik.com">
              <img id= "emer" src="images/emergency-image.png" alt="Emergencias FREEPIK">
            </a>
          </div>
        -->  


