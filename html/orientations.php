<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMA</title>
    <link rel="stylesheet" href="styles/mobile.css">
    <link rel="stylesheet" href="../css/orientation.css">
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

    <div class="main">

      <div class="content-orientarion">

        <div class="title-countainer">
                
           <h1 class="align-orientaion-tltle">ORIENTAÇÕES</h1>
          
        </div>
        


        <div class="divede-content">

            <div class="coloum-img">
             
              <img class="image-content" src="../images/orientacoes_teste_2.jpg" alt="">
              <img  class="image-content2" src="../images/teste de barra de pesquisa 3.jpeg" alt="">
            
            </div>

            <div class="text-orientation-content">
              

              <p id="little-title" class="paragraph-two">
                Do que se trata?
              </p>

              <p class="paragraph-two">
                Saber sobre o local e como agir em <br> 
                certas situações é crucial para sua segurança e aos<br>
                demais. Por isso criamos a área de "orientações", onde<br>
                temos como objetivo orientar como reagir a situações de risco <br>
                ao usuário e aos demais.
              </p>

              <p id="little-title" class="paragraph-two">
                Como lidar com a situação?
              </p>

              <p class="paragraph-two">
                Isso depende de situação para situação, mas em todos os casos <br>
                certas medidas são sempre eficazes, alguns exemplos são:
              </p>

              <p id="micro-text" class="paragraph-two">
                1. Manter a calma
              </p>

              <p id="micro-text" class="paragraph-two">
                2. Avaliar a situação
              </p>
              
              <p id="micro-text" class="paragraph-two">
                3. Proteger-se
              </p>
             
              <p id="micro-text" class="paragraph-two">
                4. Buscar auxiliar os proxímos
              </p>
              
              <p id="micro-text" class="paragraph-two">
                5. Avisar as autoridades
              </p>
             
              <p id="micro-text" class="paragraph-two">
                6. Primeiros socorros
              </p>
            
              <p id="micro-text" class="paragraph-two">
                7. Se manter o foco
              </p>

              <p class="paragraph-two">
                Seguir esses passos podem ser ser a chave para sua segurança <br>
                e aos demais em sua volta.
              </p>

              <p id="little-title2">
                Situações específicas, ações específicas
              </p>

              <p class="paragraph-two">
                Cada situação requer certos procedimentos a serem seguidos <br>
                para maximizar as chances de sucesso, tendo isso em mente, <br>
                seguem abaixo algumas orientações para situações de <br> 
                risco específicas.
              </p>

              <p class="paragraph-two">
                <span class="events">Incêndio:</span> tentar sair do local a todo custo; usar escadas em <br>
                vez de elevadores; colocar um pano húmido sobre o nariz; <br> 
                derramar água sobre as roupas para o fogo não pegar nelas; <br>
                se manter abaixo da fumaça; manter o controle da respiração <br>
                pelo nariz em rapida inalações.
              </p>

              <p class="paragraph-two">
                <span class="events">Terremoto:</span> siga o lema "abaixar, cobrir e segurar"; se manter <br>
                agachado para diminuir sua área de exposição, você deve <br> 
                se agachar de forma a permitir sua própria movimentação; <br> 
                procurar uma estrutura resistente para ficar em baixo, lugares <br> 
                como debaixo de portas e em baixo de mesas são boas opções; <br> 
                sempre se manter longe de janelas e sacadas.   
              </p>

              <p class="paragraph-two">
                <span class="events">Deslizamentos:</span>se afastar imediatamente da área de risco;<br>
                Se afastar de estruturas com fendas e rachaduras; esteja em <br>
                alerta sobre os boletins meteorológicos; Afastar-se do local; <br>
                Informe a Defesa Civil e ao Corpo de Bombeiros sobre o <br>
                deslizamento; Ajude a alertar outras pessoas que possam<br> 
                estar em risco.
              </p>

              <p class="paragraph-two">
                <span class="events">Inundações:</span> se estiver em lugar instável, o abandone o mais <br>
                 rapido possível; proteja seus pertences colocando-os em lugares<br>
                 eleveados; evite atravessar áreas alagadas, espere a água abaixar. <br>


              </p>
              


            </div>          

        </div>
        
        <div class="divede-content2">

            <div class="text-orientation-content2">
              

              <p id="little-title" class="paragraph-two">
                Prevenção doméstica contra incêndios
              </p>

              <p class="paragraph-two">
                A prevenção de incêndios em residências é fundamental para proteger<br>
                vidas e patrimônio. Com medidas simples e vigilância constante,<br>
                grande parte dos acidentes pode ser evitada. Conhecer práticas<br> 
                preventivas transforma moradores em agentes ativos da segurança.
              </p>

              <p id="little-title" class="paragraph-two">
                Medidas essenciais de controle de risco
              </p>

              <p class="paragraph-two">
                Estas ações reduzem significativamente as chances de incêndio: instale detectores de fumaça em todos os cômodos;
                Nunca sobrecarregue tomadas com benjamins;
                mantenha extintores tipo ABC em pontos estratégicos; Verifique fiações elétricas regularmente
                desligue aparelhos eletrônicos ao dormir e sempre verifique fiações elétricas regularmente
              </p>

              <p class="paragraph-two">
                Adotar essas práticas diariamente cria um ambiente<br>
                mais seguro para toda a família.
              </p>

              <p id="little-title2">
                Prevenção por ambiente
              </p>

              <p class="paragraph-two">
                Cada área da casa exige cuidados específicos:<br>
              </p>

              <p class="paragraph-two">
                <span class="events">Cozinha:</span> Nunca deixe panelas no fogão sem supervisão;<br>
                Mantenha cortinas e panos longe do fogão; Limpe regularmente<br> 
                o exaustor para evitar acúmulo de gordura.
              </p>

              <p class="paragraph-two">
                <span class="events">Área de serviço:</span> Verifique vedações de botijões de gás<br>
                com água e sabão; Não armazene produtos químicos próximos<br> 
                ao aquecedor; Mantenha ventilação adequada.
              </p>

              <p class="paragraph-two">
                <span class="events">Sala e quartos:</span> Evite velas próximas a cortinas ou móveis;<br>
                Não cubra lâmpadas com tecidos; Desligue aquecedores portáteis<br>
                antes de dormir; Utilize reguladores de voltagem em equipamentos.
              </p>

              <p class="paragraph-two">
                <span class="events">Garagem/Depósito:</span> Armazene combustíveis em recipientes<br>
                adequados e longe de fontes de calor; Mantenha ferramentas<br>
                elétricas desligadas da tomada; Organize materiais evitando<br>
                pilhas próximas a painéis elétricos.
              </p>

              <p id="little-title2_2">
                Hierarquia de Controle de Riscos
              </p>

              <p class="paragraph-two">
                A hierarquia de controle de riscos estabelece uma ordem <br>
                prioritária de medidas  para eliminar ou reduzir perigos. <br>
                Esta abordagem sistemática deve ser aplicada sequencialmente <br>
                para máxima eficácia na prevenção de acidentes.
              </p>

              
              <p id="little-title2_3">
                Hierarquia a Ser Seguida
              </p>

              <p class="paragraph-two">
                <span class="events">1. Eliminação:</span> Remover completamente o perigo do ambiente. <br>
                Exemplo: Eliminar produtos inflamáveis desnecessários da residência.
              </p>

              <p class="paragraph-two">
                <span class="events">2. Substituição:</span> Trocar materiais perigosos por alternativas seguras. <br>
                Exemplo: Substituir produtos químicos tóxicos por versões ecológicas.
              </p>

              <p class="paragraph-two">
                <span class="events">3. Controles de Engenharia:</span> Implementar barreiras físicas de proteção. <br>
                Exemplo: Instalar dispositivos automáticos de corte de energia em circuitos.
              </p>

              <p class="paragraph-two">
                <span class="events">4. Sinalização e Bloqueio:</span> Identificar perigos e restringir acesso. <br>
                Exemplo: Sinalizar áreas de risco e utilizar bloqueios em painéis elétricos.
              </p>

              <p class="paragraph-two">
                <span class="events">5. EPI (Equipamento de Proteção Individual):</span> Última linha de defesa quando <br>
                os riscos não podem ser totalmente eliminados. Exemplo: Utilizar luvas térmicas <br>
                e óculos de proteção ao manusear materiais perigosos.
              </p>
              
            </div> 

            <div class="coloum-img">
             
              <img class="image-content" src="../images/incendio.jpg" alt="">
              <img  class="image-content2" src="../images/importancia.jpg" alt="">
            
            </div>

         

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
  </body>
</html>

