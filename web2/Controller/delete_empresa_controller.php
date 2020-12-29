<?php
    require_once dirname(__FILE__)."./../Model/empresa_dao.php";

    $EmpresaDAO = new EmpresaDAO();

    $cnpj = $_GET["cnpj"];
    $empresa = new Empresa("VOU APAGAR", "VOU APAGAR", $cnpj);
    $EmpresaDAO->excluir($empresa);
    header("location: ./../View/listagem_empresa.php");
?>