<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/DelProd.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Delete</title>
    <?php
        include "../../../../HTML/PHP/LigacaoBD.php";
        $sql = "SELECT * FROM lojanormal WHERE IDItem = '".$_GET['id']."';";
                
        $produto = $conn->query($sql);
        
        if ($produto) {
            $Produto = [];
            while ($row = $produto->fetch_assoc()) {
                $Produto[] = $row;
            }
        } else {
            echo "Erro na consulta: ".$conn->error;
        }

        include '../../../HTML/NavBar.html';
    ?>
</head>
<body>
    <div class="sectionForNavbar"></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="Espaco"></div>
            </div>
            <div class="col-12">
                <div class="area">
                    <img src="../../../IMAGES/alerta.webp" alt="alerta" class="alerta">
                    <h2>Tem a certeza que deseja eliminar este produto?</h2>
                            <?php
                            foreach($Produto as $imgProd){
                                echo'<img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($imgProd['NomeDaImagem']).'" alt="..." class="imgProd">';
                            }

                            echo'<input type="text" value="'.utf8_encode($imgProd['NomeDaImagem']).'" id="nmImg" hidden>';
                            echo'                    
                            
                            <button class="cancelar" onclick="javascript:history.back()">Cancelar</button>
                            <a href="ConfirmDelProd.php?id='.$imgProd['IDItem'].'"><button class="confirm">Confirmar</button></a>';
                        ?>
                </div>
            </div>
            <div class="col-12">
                <div class="Espaco"></div>
            </div>
        </div>
    </div>
</body>
</html>