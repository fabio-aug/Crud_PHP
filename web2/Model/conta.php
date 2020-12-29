<?php
class Conta {
    private $saldo;
    private $numero;
    private $cpf;
    private $cnpj;
    
    public function __construct($saldo, $numero, $cpf, $cnpj) {
        $this->saldo = $saldo;
        $this->numero = $numero;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
    }

    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getCnpj() {
        return $this->cnpj;
    }
}
?>