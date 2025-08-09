<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Servicos</title>

    <link rel="icon" href="ASSETS/IMG/Megumi.png">
    <link rel="stylesheet" href="RESOURCES\STLYS\servicos.css">

    <style>
        @media only screen and (max-width: 590px) {
            #h01-2-2 {
                top: 180px;
            }
        }
    </style>
</head>
<body class="container col">
    <div class="container col" id="h02">
        <div class="container" id="h02-2">
            <a href="#FUNKO POP">FUNKO POP</a>
            <a href="#FIGMA">FIGMA</a>
            <a href="#DARK HORSE">DARK HORSE</a>
            <a href="#TSUME ARTS">TSUME ARTS</a>
        </div>

        <button class="container col" id="h02-1">
            <span class="menu-btn-bar" id="mn-bar01"></span>
            <span class="menu-btn-bar" id="mn-bar02"></span>
        </button>
    </div>

    <main class="container col">
    <div class='m01 main-items container row'>
        <?php
            $array = array(
                "FUNKO POP" => "FUNKO POP",
                "FIGMA" => "FIGMA",
                "DARK HORSE" => "DARK HORSE",
                "TSUME ARTS" => "TSUME ARTS",
            );

            foreach ($array as &$item) {
                $checkQuery = $conex->prepare("SELECT COUNT(*) FROM produto WHERE brand = '".$item."'");
                $checkQuery->execute();
                $checkQuery->bind_result($count); // o resultado da consulta (contagem de registros) é vinculado à variável $count -- se maior que 0, significa que o registro existe e a atualização pode ser feita
                $checkQuery->fetch(); // método fetch() é chamado para obter o resultado da consulta e preencher a variável $count com o valor retornado
                $checkQuery->close();

                if ($count > 0) {
                    $slc = $conex->prepare("SELECT * FROM produto WHERE brand = '".$item."'");
                    $slc->execute();
                    $result = $slc->get_result();

                    echo"
                        <div class='category container' id='".$item."'>
                            <span></span><p>".$item."</p><span></span>
                        </div>
                    ";

                    while ($row = $result->fetch_assoc()) {
                        $sellsValue = ($row['sells'] != 0) ? $row['sells'] : 0;

                        echo"
                                <div class='card' id='m01-1'>
                                    <div class='container col' id='m01-1-1'>
                                        <div class='container product-image' id='m01-1-1-1'>
                                            <img src='ASSETS/IMG/". $row['image'] ."' alt='aaa' class='product-image'>
                                        </div>

                                        <div class='product-info container col' id='m01-1-1-2'>
                                            <div class='mm01 container row' id='m01-1-1-2-1'>
                                                <p class='product-name'>". $row['name'] . "</p>
                                            </div>
                                            <div class='mm01 container' id='m01-1-1-2-2'>

                                                <div class='stock container row'>
                                                    <img src='ASSETS/IMG/box-solid.svg' class='product-icon container'>
                                                    <p>". $row['quantity'] . "</p>
                                                </div>

                                                <div class='sells container row'>   
                                                    <img src='ASSETS/IMG/sells.svg' class='product-icon container'>
                                                    <p>". $sellsValue      . "</p>
                                                </div>

                                                    <div class='price container row'>
                                                    <span>R$</span>
                                                    <p>". $row['price']    . "</p>
                                                </div>

                                            </div>
                                            <div class='mm01 container row' id='m01-1-1-2-3'>

                                                <div class='row'>
                                                    <img src='ASSETS/IMG/star-regular.svg' class='product-icon container'>
                                                    <p class='stars'>". $row['stars'] ."</p>
                                                </div>

                                                <div class='row'>
                                                    <button onclick=\"
                                                    location.href='?page=produto&id=".$row['id_product']."';\"
                                                    class='btn btn-success'>Editar</button>
                                                </div>
                                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ";
                    };
                };
            }
        ?>
        </div>
    </main>

    <script src="RESOURCES\SCRPTS\theme.js"></script>
</body>
</html>