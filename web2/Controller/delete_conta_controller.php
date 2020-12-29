<?php
    require_once dirname(__FILE__)."./../Model/conta_dao.php";

    $ContaDAO = new ContaDAO();

    $numero = $_GET["num"];
    $conta = new Conta("VOU APAGAR", $numero, "VOU APAGAR", "VOU APAGAR");
    $ContaDAO->excluir($conta);
    header("location: ./../View/listagem_conta.php");
?>