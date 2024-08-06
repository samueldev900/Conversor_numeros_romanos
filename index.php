<?php
    require "Romanos.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['numeroDecimal'])){

            $numeroDecimal = intval($_POST['numeroDecimal']);
            $conversor = new Romanos($numeroDecimal);
            $resultado = $conversor->getRomano();
            $numeroInformado = $conversor->getNumeroInteiro();

        }
        elseif(isset($_POST['numeroRomano'])){

            $stringRomano = strtoupper($_POST['numeroRomano']);
            $romanoInformado = strtoupper($_POST['numeroRomano']);
            $conversor = new Romanos($stringRomano);
            $resultado = $conversor->getResultadoStringToDecimal();

        }

    }

?>

<style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
 
        .content {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
<!doctype html>
<html lang="en">
    <head>
        <title>Conversor para Números Romanos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <style>

    </style>
    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <?php 
        
        
        ?>
        <main class="container-sm mt-4 p-2">
            <h2>Conversor para Números Romanos</h2>
            <form action="" method="POST" class="container mt-5">
                <div class="form-group container col-sm-7">
                    <div class="d-flex align-items-center">
                        <label class="m-4" for="numeroDecimal">Decimal: </label>
                        <input type="number" id="numeroDecimal" name="numeroDecimal" class="form-control me-2" min="1" max="10000">
                        <button type="submit" class="btn btn-primary">Converter para Romano</button>
                    </div>
                </div>
            </form>
            <form action="" method="POST" class="container mt-5">
                <div class="form-group container col-sm-7">
                    <div class="d-flex align-items-center">
                        <label class="m-4" for="numeroRomano">Romano: </label>
                        <input type="text" id="numeroRomano" name="numeroRomano" class="form-control me-2" min="1" max="10000">
                        <button type="submit" class="btn btn-primary">Converter para Decimal</button>
                    </div>
                </div>
            </form>

            <?php if (isset($resultado)): ?>
                <div class="mt-4 d-flex align-items-center  p-3">
                    <h5>Resultado:</h5>
                    <h5 class="mx-2"> <?php
                        if(isset($numeroInformado) && isset($resultado)){
                            echo  $numeroInformado ."  →  ". $resultado; 
                        }
                        elseif(isset($resultado)){
                            echo $romanoInformado . "  →  ". $resultado;
                        }
                      ?></h5>
                </div>
            <?php endif; ?>
        </main>


        <footer class="bg-light text-center py-3">
            <p>Create by Samuel Oliveira</p>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
         </script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
