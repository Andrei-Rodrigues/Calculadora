<?php
    session_start();
    require_once 'calculo.class.php';

    if (!isset($_SESSION['resultados'])) {
        $_SESSION['resultados'] = [];
    }

    if (isset($_POST['n1']) &&
        isset($_POST['n2']) &&
        isset($_POST['operacao'])) {
            
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            $operacao = $_POST['operacao'];

            if (!is_numeric($n1) || !is_numeric($n2)) {
                $_SESSION['erro'] = 'n1 ou n2 n eh numero';
                header('location:index.php');
                return;
            }

            $resultado = 0;

            switch ($operacao) {
                case '+':
                    $resultado = $n1 + $n2;
                    break;

                case '-':
                    $resultado = $n1 - $n2;
                    break;

                case '*':
                    $resultado = $n1 * $n2;
                    break;

                case '/':
                    if ($n1 <= 0 || $n2 <= 0) {
                        $_SESSION['erro'] = 'Nenhum numero pode ser menor ou igual a 0';
                        header('location:index.php');
                        return;
                    }

                    $resultado = $n1 / $n2;
                    break;

                default:
                    $_SESSION['erro'] = 'Operacao nao encontrada';
                    header('location:index.php');
                    return;
            }
            
            $calculo = new Calculo($n1, $n2, $operacao, $resultado);

            $_SESSION['sucesso'] = 'Calculo feito com sucesso, resultado = '.$resultado;
            $_SESSION['resultados'][] = serialize($calculo);

            header('location:index.php');

    } else {
        $_SESSION['erro'] = 'Informe a operaçao';
        header('location:index.php');
    }

?>