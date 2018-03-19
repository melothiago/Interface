<?php
require_once 'Controlador.php';
class Lutador implements Controlador{
    
    //Atributos
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;
    
    // Metodos especiais
    public function __construct($no, $na, $id, $al, $pe, $vi, $de, $em) {
        
        $this->setNome($no);
        $this->setNacionalidade($na);
        $this->setIdade($id);
        $this->setAltura($al);
        $this->setPeso($pe);
        $this->setVitorias($vi);
        $this->setDerrotas($de);
        $this->setEmpates($em);
        
    }
    
    public function getNome() {
        return $this->nome;
    }
    private function setNome($nome) {
        $this->nome = $nome;
    }
    private function getNacionalidade() {
        return $this->nacionalidade;
    }
    private function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }
    private function getIdade() {
        return $this->idade;
    }
    private function setIdade($idade) {
        $this->idade = $idade;
    }
    private function getAltura() {
        return $this->altura;
    }
    private function setAltura($altura) {
        $this->altura = $altura;
    }
    private function getPeso() {
        return $this->peso;
    }
    private function setPeso($peso) {
        $this->peso = $peso;
        $this->setCategoria();
    }
    public function getCategoria() {
        return $this->categoria;
    }
    private function setCategoria() {
        
        if ($this->getPeso() < 52.2){
            $this->categoria = "Invalido";    
        }elseif ($this->getPeso() <= 70.3) {
            $this->categoria = "Leve";
        }elseif ($this->getPeso() <= 83.9){
            $this->categoria = "Medio";
        }elseif ($this->getPeso() <= 120.2) {
            $this->categoria = "Pesado";
        }else{
            $this->categoria = "Invalido";
        }
                
    }
    private function getVitorias() {
        return $this->vitorias;
    }
    private function setVitorias($vitorias) {
        $this->vitorias = $vitorias;
    }
    private function getDerrotas() {
        return $this->derrotas;
    }
    private function setDerrotas($derrotas) {
        $this->derrotas = $derrotas;
    }
    private function getEmpates() {
        return $this->empates;
    }
    private function setEmpates($empates) {
        $this->empates = $empates;
    }
    
    // Metodos
    public function apresentar(){
        echo "</br>------------------------------------";
        echo "</br>Lutador: " . $this->getNome();
        echo "</br>Origem: " . $this->getNacionalidade();
        echo "</br>" . $this->getIdade() . " anos";
        echo "</br>" . $this->getAltura() . " m de altura";
        echo "</br>Pesando: " . $this->getPeso() . " Kg";
        echo "</br>Ganhou: " . $this->getVitorias();
        echo "</br>Perdeu: " . $this->getDerrotas();
        echo "</br>Empatou: " . $this->getEmpates();
    }
    public function status(){
        echo "</br>------------------------------------";
        echo "</br>" . $this->getNome() . " e um peso " . $this->getCategoria();
        echo "</br>" . $this->getVitorias() . " Vitorias";
        echo "</br>" . $this->getDerrotas() . " Derrotas";
        echo "</br>" . $this->getEmpates() . " Empates";
    }
    public function ganharLuta(){
        $this->setVitorias($this->getVitorias() + 1);
    }
    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas() + 1);
    }
    public function empatarLuta(){
        $this->setEmpates($this->getEmpates() + 1);
    }
    
}
