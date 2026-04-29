<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/AddProd.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Adicionar produto</title>
    <?php
        include '../../../HTML/NavBar.html';
    ?>
</head>
<body>
    <div class="sectionForNavbar"></div>
    <div class="container">
        <form action="ConfirmarAdd.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="Espaco"></div>
            </div>
            <div class="col-12">
                <div class="area"> 
                    <div class="container">
                        <div class="row">
                             <div class="col-4 imagem-upload">
                                <label for="imagemInput">Selecionar Imagem</label>
                                <input type="file" name="imagem" id="imagemInput" accept="image/*" required>
                                <img id="previewImagem" src="#" alt="Pré-visualização">
                                <input type="hidden" name="nmImg" id="nmImg">
                            </div>
                            <div class="col-8">
                                <div class="InfProduct">
                                    <div class="corpo">
                                        <div class="container">
                                        <div class="row">
                            
                                        <div class="col-12">
                                        <h4>Nome</h4>
                                            <input type="text" name="nome" id="nome" placeholder="Insira o Nome do produto">
                                        </div>
                                        <div class="col-6">
                                        <h4>Equipa</h4>
                                            <input type="text" name="equipa" id="equipa" placeholder="Insira a Equipa">
                                        </div>
                                        <div class="col-6">
                                        <h4>Categoria</h4>
                                            <input type="text" name="categoria" id="categoria" placeholder="Insira a Categoria">
                                        </div>
                                        <div class="col-4">
                                        <h4>Género/Idade</h4>
                                            <input type="text" name="genIdade" id="genIdade" placeholder="Insira o Gênero/Idade">
                                        </div>
                                        <div class="col-4">
                                        <h4>Valor</h4>
                                            <input type="number" name="valor" id="valor" placeholder="Insira o Valor">
                                        </div>
                                        <div class="col-4">
                                        <h4>Quantidade</h4>
                                            <input type="number" name="quantidade" id="quantidade" placeholder="Insira a Quantidade">
                                        </div>
                                        <h4>Descrição</h4>
                                        <textarea id="descricao" rows="5" placeholder="Insira a Descrição do produto"></textarea>
                                        <div class="col-6">
                                            <button class="cancelar" onclick="javascript:history.back()">Cancelar</button>
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" value="Confirmar" class="confirm">
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

<script>
    document.getElementById("imagemInput").addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById("previewImagem");
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
            document.getElementById("nmImg").value = file.name;
        }
    });
</script>

</body>
</html>