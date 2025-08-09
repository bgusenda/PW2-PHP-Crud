<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <link rel="icon" href="ASSETS/IMG/Megumi.png">
    <link rel="stylesheet" href="RESOURCES\STLYS\theme-megumi.css">
    <link rel="stylesheet" href="RESOURCES\STLYS\root.css">
    <link rel="stylesheet" href="RESOURCES\STLYS\style.css">
</head>
<body class="container col">
    <header>
        <div class="header-items container" id="h01">
            <div class="logo" id="h01-1">
                <img src="ASSETS/IMG/logo.png">
                <div id="audio"></div>
            </div>
            
            <div class="container" id="h01-2">
                <button class="container col" id="h01-2-1">
                    <span class="menu-btn-bar" id="mn-bar01"></span>
                    <span class="menu-btn-bar" id="mn-bar02"></span>
                    <span class="menu-btn-bar" id="mn-bar03"></span>
                </button>

                <div class="dropdown-header container" id="h01-2-2">
                    <div class="item"><a href="index.php" aria-current="page">Home</a></div>

                    <div class="item"><a href="?page=servicos">Servicos</a></div>

                    <div class="item"><a href="controle.php">Controle</a></div>

                    <div class="item"><a href="contato.html">Contato</a></div>

                    <div class="item"><a href="login.html">Login</a></div>
                </div>
            </div>

            <div class="header-buttons container" id="h01-3">
                <button id="meguna-btn" class="theme"><img src="ASSETS/IMG/moon.svg"></button>
                <button id="megumin-btn" class="theme"><img src="ASSETS/IMG/sun.svg"></button>
            </div>
        </div>
    </header>

    <main>
        <?php
            include("RESOURCES/PHP/connect.php");

            switch(@$_REQUEST["page"])
            {
                case "servicos":
                    include("servicos.php");
                break;

                case "produto":
                    include("produto.php");
                break;

                case "salvar":
                    include("salvar-usuario.php");
                break;   

                case "editar":
                    include("editar-usuario.php");
                break;  
            }
        ?>
    </main>

    <script src="RESOURCES\SCRPTS\theme.js"></script>
</body>
</html>