<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
          
        .container {
            width: 100%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin-top: 30px;
            margin-left: 600px;
            margin-bottom: 30px;
        }
        
        header {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .content {
            padding: 25px;
        }
        
        .section {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        h2 {
            color: #2575fc;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        h2 i {
            font-size: 1.5rem;
        }
        
        .btn {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 117, 252, 0.4);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .search-box {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 50px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }
        
        input:focus {
            border-color: #2575fc;
        }
        
        .location-data {
            margin-top: 15px;
            padding: 15px;
            background-color: white;
            border-radius: 10px;
            border-left: 4px solid #2575fc;
        }
        
        .data-row {
            display: flex;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .data-label {
            font-weight: 600;
            width: 120px;
            color: #6a11cb;
        }
        
        .data-value {
            flex: 1;
        }
        
        .map-container {
            height: 250px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 15px;
            background-color: #eef2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }
        
        .status {
            padding: 10px 15px;
            border-radius: 50px;
            background-color: #f1f8ff;
            color: #2575fc;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }
        
        .status.error {
            background-color: #ffeef0;
            color: #d73a49;
        }
        
        .status.success {
            background-color: #f0fff4;
            color: #2ea44f;
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            color: white;
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        @media (max-width: 600px) {
            .container {
                border-radius: 10px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .search-box {
                flex-direction: column;
            }
            
            .btn {
                justify-content: center;
            }
        }
    </style>
    <link rel="stylesheet" href="styles/mobile.css">
    <link rel="stylesheet" href="../css/location.css">
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
      
      <div class="container">
        <header>
            <h1><i class="fas fa-location-dot"></i> API de Localização</h1>
            <p class="subtitle">Obtenha suas coordenadas e encontre endereços</p>
        </header>
        
        <div class="content">
            <div class="section">
                <h2><i class="fas fa-location-crosshairs"></i> Sua Localização Atual</h2>
                <button id="getLocation" class="btn">
                    <i class="fas fa-map-marker-alt"></i> Obter Localização
                </button>
                
                <div id="locationStatus" class="status">Clique no botão para obter sua localização</div>
                
                <div id="locationData" class="location-data" style="display: none;">
                    <div class="data-row">
                        <div class="data-label">Latitude:</div>
                        <div id="latitude" class="data-value">-</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Longitude:</div>
                        <div id="longitude" class="data-value">-</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Precisão:</div>
                        <div id="accuracy" class="data-value">-</div>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <h2><i class="fas fa-map"></i> Visualização do Mapa</h2>
                <div id="map" class="map-container">
                    <p>O mapa será exibido aqui após obter a localização</p>
                </div>
            </div>
            
            <div class="section">
                <h2><i class="fas fa-search"></i> Buscar Endereço</h2>
                <div class="search-box">
                    <input type="text" id="addressInput" placeholder="Digite um endereço...">
                    <button id="searchAddress" class="btn">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
                
                <div id="addressData" class="location-data" style="display: none;">
                    <div class="data-row">
                        <div class="data-label">Endereço:</div>
                        <div id="formattedAddress" class="data-value">-</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Coordenadas:</div>
                        <div id="searchedCoords" class="data-value">-</div>
                    </div>
                </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const getLocationBtn = document.getElementById('getLocation');
            const locationStatus = document.getElementById('locationStatus');
            const locationData = document.getElementById('locationData');
            const searchAddressBtn = document.getElementById('searchAddress');
            const addressData = document.getElementById('addressData');
            const mapContainer = document.getElementById('map');
            
            // Função para obter a localização
            function getLocation() {
                locationStatus.textContent = "Obtendo localização...";
                locationStatus.className = "status";
                
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        showPosition,
                        handleError,
                        {
                            enableHighAccuracy: true,
                            timeout: 10000,
                            maximumAge: 60000
                        }
                    );
                } else {
                    locationStatus.textContent = "Geolocalização não é suportada por este navegador.";
                    locationStatus.className = "status error";
                }
            }
            
            // Função para exibir a posição
            function showPosition(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const accuracy = position.coords.accuracy;
                
                document.getElementById('latitude').textContent = latitude.toFixed(6);
                document.getElementById('longitude').textContent = longitude.toFixed(6);
                document.getElementById('accuracy').textContent = `${accuracy.toFixed(2)} metros`;
                
                locationData.style.display = 'block';
                locationStatus.textContent = "Localização obtida com sucesso!";
                locationStatus.className = "status success";
                
                // Exibir mapa estático
                showMap(latitude, longitude);
            }
            
            // Função para tratar erros
            function handleError(error) {
                let errorMessage;
                
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = "Permissão para acesso à localização negada.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = "Informações de localização não disponíveis.";
                        break;
                    case error.TIMEOUT:
                        errorMessage = "Tempo de solicitação de localização esgotado.";
                        break;
                    default:
                        errorMessage = "Erro desconhecido.";
                }
                
                locationStatus.textContent = errorMessage;
                locationStatus.className = "status error";
            }
            
            // Função para exibir mapa estático
            function showMap(lat, lng) {
                const mapUrl = `https://maps.google.com/maps?q=${lat},${lng}&z=15&output=embed`;
                
                mapContainer.innerHTML = `
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="${mapUrl}"
                        style="border:0;">
                    </iframe>
                `;
            }
            
            // Função para buscar endereço
            function searchAddress() {
                const address = document.getElementById('addressInput').value.trim();
                
                if (!address) {
                    alert("Por favor, digite um endereço para buscar.");
                    return;
                }
                
                // Usando a API de Geocodificação do Nominatim (OpenStreetMap)
                const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;
                
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            const firstResult = data[0];
                            const lat = firstResult.lat;
                            const lon = firstResult.lon;
                            const displayName = firstResult.display_name;
                            
                            document.getElementById('formattedAddress').textContent = displayName;
                            document.getElementById('searchedCoords').textContent = `${lat}, ${lon}`;
                            addressData.style.display = 'block';
                            
                            // Atualizar o mapa
                            showMap(lat, lon);
                        } else {
                            alert("Nenhum resultado encontrado para este endereço.");
                        }
                    })
                    .catch(error => {
                        console.error("Erro ao buscar endereço:", error);
                        alert("Ocorreu um erro ao buscar o endereço. Tente novamente.");
                    });
            }
            
            // Event Listeners
            getLocationBtn.addEventListener('click', getLocation);
            searchAddressBtn.addEventListener('click', searchAddress);
            
            // Permitir busca com Enter
            document.getElementById('addressInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchAddress();
                }
            });
        });
    </script>
  </body>
</html>

