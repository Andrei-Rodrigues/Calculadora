<?php
session_start();
require_once 'calculo.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela - Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <h1 class="text-center mt-1">Tabela de Alunos - Web II - FL02</h1>

    <?php
    if (isset($_SESSION['sucesso'])) {
        ?>
        <h2 class="text-success"><?=$_SESSION['sucesso']?></h2>
        <?php
        unset($_SESSION['sucesso']);
    } else if (isset($_SESSION['erro'])) {
        ?>
        <h2 class="text-danger"><?=$_SESSION['erro']?></h2>
        <?php
        unset($_SESSION['erro']);
    }
    ?>

    <form action="calculadora.php" method="post">

        <input type="number" name="n1" placeholder="Numero 1" step="0.01" required class="form-control"><br>

        <input type="number" name="n2" placeholder="Numero 2" step="0.01"  required class="form-control"><br>
        
        <input type="radio" name="operacao" value="+">
        <label for="+">+</label><br>

        <input type="radio" name="operacao" value="-">
        <label for="-">-</label><br>

        <input type="radio" name="operacao" value="*">
        <label for="*">*</label><br>

        <input type="radio" name="operacao" value="/">
        <label for="/">/</label><br>

        <input type="submit" value="Calcular" class="btn btn-success">
    </form>

    <div class="row mt-4">
        <div class="col-12">
            <?php
            if (isset($_SESSION['resultados'])) {
            ?>
            <table class="table table-light table-hover table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Numero 1</th>
                        <th>Operação</th>
                        <th>Numero 2</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $resultados = $_SESSION['resultados'];

                    foreach ($resultados as $resultado) {
                        $calculo = unserialize($resultado);
                        echo '<tr>';
                        echo '<td>'.$calculo->n1.'</td>';
                        echo '<td>'.$calculo->operacao.'</td>';
                        echo '<td>'.$calculo->n2.'</td>';
                        echo '<td>'.$calculo->resultado.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            
            <a href="limpacalculadora.php" class="btn btn-danger">Limpar Histórico</a>
            <?php
            } else {
                ?>
                <h2>Sem calculos.</h2>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>