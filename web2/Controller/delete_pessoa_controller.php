<?php
    require_once dirname(__FILE__)."./../Model/pessoa_dao.php";

    $PessoaDAO = new PessoaDAO();

    $cpf = $_GET["cpf"];
    $pessoa = new Pessoa("VOU APAGAR", $cpf);
    $PessoaDAO->excluir($pessoa);
    header("location: ./../View/listagem_empresa.php");
?>