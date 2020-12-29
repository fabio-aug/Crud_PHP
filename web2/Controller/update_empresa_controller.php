<?php
    require_once dirname(__FILE__)."./../Model/empresa_dao.php";

    $EmpresaDAO = new EmpresaDAO();

    $cnpj = $_GET["cnpj"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $tipofd = $_POST['tipofd'];

        if (empty($nome) or empty($tipofd)) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "É necessário preencher todos parâmetros";
            echo '</div>';
            die;
        }

        $empresa = new Empresa($nome, $tipofd, $cnpj);
        $EmpresaDAO->atualizar($empresa);
        header("location: ./../View/listagem_empresa.php");
    }
?>