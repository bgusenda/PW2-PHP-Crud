<?php
/* ====== CONNECTION CHECK ====== */
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'megumin';

$conex = new mysqli('localhost','root','','megumin');

if($conex->connect_error) { die("Falha ao dar o cu pro banco de dados :( erro: ".$conex->connect_error); }



/* ====== FUNCTIONS ====== */
function alertMessage($msgText, $redirectTo) {
    echo "<script>
            alert('".$msgText."');
            window.location.href = '".$redirectTo."';
        </script>";
}


            switch(@$_REQUEST["page"])
            {

                case "produto":
                    include("produto.php");
                break;  
                 
            }


?>