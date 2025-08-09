<p>adada</p>
<?php
                    $slc = $conex->prepare("SELECT * FROM produto WHERE id_product='".$_REQUEST["id"]."'");
                    $slc->execute();
                    $result = $slc->get_result();
                    $row = $result->fetch_assoc();
                    
                        $sellsValue = ($row['sells'] != 0) ? $row['sells'] : 0;
                        
                        echo"

                        ID: ". $row['id_product'] ."
                        ada
                        ";
                 
                    
            




?>