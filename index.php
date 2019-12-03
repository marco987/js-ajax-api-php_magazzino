<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logistica</title>
    <!-- Font LATO -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,900&display=swap" rel="stylesheet">
    <!-- JS: HANDLEBARS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.4.2/handlebars.min.js" charset="utf-8"></script>
        <!-- TEMPLATE -->
        <script id="item-template" type="text/x-handlebars-template">
        
            <div class="box-prodotto border-box" id_prodotto={{id}}>
                <div>
                    <h3 class="name">{{name_prodotto}}</h3>
                    <p class="description">{{description}}</p>
                </div>
                <div>
                    <button id_prodotto={{id}} name_prodotto={{name_prodotto}}>NOME CTA</button>
                </div>
            </div>
        
        </script>

        <script id="store-template" type="text/x-handlebars-template">
        
            <div class="box-magazzino border-box">
                <div class="magazzino">
                    <h3 class="name"><span style="font-weight: normal;">Magazzino </span>{{name_magazzino}}</h3>
                    <p class="description">Distanza <span style="font-weight: bold;">{{distance}} km</span></p>
                    <button name_magazzino={{name_magazzino}} name_prodotto={{name_prodotto}} qty_prodotto={{qty}} minqty_prodotto={{minqty}}>NOME CTA</button>
                </div>
            </div>
        
        </script>

        <script id="alert-template" type="text/x-handlebars-template">
        
        <div id="background-conferma">
            <div id="alert-conferma">
                <h2>Azione confermata</h2>
                <h3>Prodotto: <span style="font-weight: normal;">{{prodotto}}</span></h3>
                <h3>Magazzino: <span style="font-weight: normal;">{{magazzino}}</span></h3>
                <h3>Articoli inviati: <span style="font-weight: normal;">{{diff}}</span></h3>
                <button>CHIUDI</button>
            </div>
        </div>
        
        </script>

    <!-- CSS: MY STYLE -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="web-app">
        <h1>GestioneMagazzini</h1>
        <h1>Gestione ristoccaggio magazzini</h1>
        <div id="search-bar" class="border-box">
            <img src="img/ico-search.png" alt="ico-search">
            <input type="text" id="search-input" placeholder="Di cosa hai bisogno oggi?">
            <button type="submit" id="search-button">CERCA</button>
        </div>
        <h2>Risultati</h2>
    </div>

<!-- JS: jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JS: MY SCRIPT -->
<script src="script.js" charset="utf-8"></script>
    
</body>
</html>