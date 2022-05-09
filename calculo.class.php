<?php

class Calculo {

    public $n1;
    public $n2;
    public $operacao;
    public $resultado;

    public function __construct($n1, $n2, $operacao, $resultado) {
        $this->n1 = $n1;
        $this->n2 = $n2;
        $this->operacao = $operacao;
        $this->resultado = $resultado;
    }
    
}
