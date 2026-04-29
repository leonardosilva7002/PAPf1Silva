<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/EditProd.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Edit</title>

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

        <div class="cardProduct">
            <div class="container">
            <div class="row">

                <div class="col-4">
                    <div class="ImgProduct">
                        <?php
                            foreach($Produto as $imgProd){
                                echo'<img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($imgProd['NomeDaImagem']).'" alt="...">';
                            }

                            echo'<input type="text" value="'.utf8_encode($imgProd['NomeDaImagem']).'" id="nmImg" hidden>';
                        ?>
                    </div>
                </div>
                
                <div class="col-8">
                    <div class="InfProduct">
                    <div class="corpo">
                        <div class="container">
                        <div class="row">
                            <?php
                                foreach($Produto as $infProd){
                                    echo'
                                        <div class="col-12">
                                        <h4>Nome</h4>
                                            <input type="text" name="nome" id="nome" value="'.$infProd['Nome'].'">
                                        </div>
                                        <div class="col-6">
                                        <h4>Equipa</h4>
                                            <input type="text" name="equipa" id="equipa" value="'.$infProd['Equipa'].'">
                                        </div>
                                        <div class="col-6">
                                        <h4>Categoria</h4>
                                            <input type="text" name="categoria" id="categoria" value="'.$infProd['Categoria'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Género/Idade</h4>
                                            <input type="text" name="genIdade" id="genIdade" value="'.$infProd['GeneroIdade'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Valor</h4>
                                            <input type="number" name="valor" id="valor" value="'.$infProd['ValorEuro'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Quantidade</h4>
                                            <input type="number" name="quantidade" id="quantidade" value="'.$infProd['Quantidade'].'">
                                        </div>
                                        <h4>Descrição</h4>
                                        <textarea id="descricao" rows="5">'.$infProd['Descricao'].'</textarea>
                                        <div class="col-4">
                                            <a href="DelProd.php?id='.$infProd['IDItem'].'"><button class="eliminar">Eliminar</button></a>
                                        </div>
                                        <div class="col-4">
                                            <button class="cancelar" onclick="javascript:history.back()">Cancelar</button>
                                        </div>
                                        <div class="col-4">
                                            <input type="button" value="Confirmar" class="confirm">
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>

        <div class="col-12">
          <div class="Espaco"></div>
        </div>

    </div>
    </div>


    <script>
  function Edit() {

    var id = new URLSearchParams(window.location.search).get("id");

    var nome = document.getElementById("nome").value;
    var equipa = document.getElementById("equipa").value;
    var categoria = document.getElementById("categoria").value;
    var genIdade = document.getElementById("genIdade").value;
    var valor = document.getElementById("valor").value;
    var quantidade = document.getElementById("quantidade").value;
    var descricao = document.getElementById("descricao").value;
    var nmImg = document.getElementById("nmImg").value;

    fetch('ConfirmarEdit.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `id=${encodeURIComponent(id)}&nome=${encodeURIComponent(nome)}&equipa=${encodeURIComponent(equipa)}&categoria=${encodeURIComponent(categoria)}&genIdade=${encodeURIComponent(genIdade)}&valor=${encodeURIComponent(valor)}&quantidade=${encodeURIComponent(quantidade)}&descricao=${encodeURIComponent(descricao)}&nmImg=${encodeURIComponent(nmImg)}`
    })
    .then(response => response.text())
    .then(data => {
      if (data.includes("PainelAdministrativo.php")) {
        window.location.href = "http://localhost/SiteF1Test/Gestor/PHP/LojaNormal/PHP/ConfirmarEdit.php";
      } else {
        alert("Erro ao atualizar: " + data);
      }
    })
    .catch(error => console.error('Erro:', error));
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.confirm').addEventListener('click', function (event) {
      event.preventDefault();
      Edit();
    });
  });
</script>

</body>
</html>