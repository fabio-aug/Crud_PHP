<?php
class Empresa {
    private $nome;
    private $tipofd;
    private $cnpj;
    
    public function __construct($nome, $tipofd, $cnpj) {
        $this->nome = $nome;
        $this->tipofd = $tipofd;
        $this->cnpj = $cnpj;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipofd($tipofd) {
        $this->tipofd = $tipofd;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipofd() {
        return $this->tipofd;
    }

    public function getCnpj() {
        return $this->cnpj;
    }
}
?>