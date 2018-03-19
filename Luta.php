<?php
require_once 'Lutador.php';
class Luta {
    //Atributos
    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;
    //Metodos especiais
    function getDesafiado() {
        return $this->desafiado;
    }
    function setDesafiado($desafiado) {
        $this->desafiado = $desafiado;
    }
    function getDesafiante() {
        return $this->desafiante;
    }
    function setDesafiante($desafiante) {
        $this->desafiante = $desafiante;
    }
    function getRounds() {
        return $this->rounds;
    }
    function setRounds($rounds) {
        $this->rounds = $rounds;
    }
    function getAprovada() {
        return $this->aprovada;
    }
    function setAprovada($aprovada) {
        $this->aprovada = $aprovada;
    }

    //Metodos publicos
    public function marcarLuta($l1, $l2) {
        
        if($l1->getCategoria() === $l2->getCategoria()
                && ($l1 != $l2)){
            $this->setAprovada(TRUE);
            $this->setDesafiado($l1);
            $this->setDesafiante($l2);
        }else{
            $this->setAprovada(FALSE);
            $this->setDesafiado(NULL);
            $this->setDesafiante(NULL);
        }
        
    }
    public function lutar() {
        if($this->getAprovada()){
            $this->desafiado->apresentar();
            $this->desafiante->apresentar();
            $vencedor = rand(0, 2);
            switch ($vencedor) {
                case 0:

                    echo "</br>Empate!";
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarLuta();
                    break;
                case 1:
                    echo "</br>" . $this->desafiado->getNome() . " venceu!";
                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();
                    break;
                case 2:
                    echo "</br>" . $this->desafiante->getNome() . " venceu!";
                    $this->desafiante->ganharLuta();
                    $this->desafiado->perderLuta();
                    break;
            }
        } else {
            echo "</br>Luta nao pode acontecer";
        }
    }
}
