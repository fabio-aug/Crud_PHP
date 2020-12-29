<?php
    require_once dirname(__FILE__)."./../Model/empresa_dao.php";

    $EmpresaDAO = new EmpresaDAO();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST['nome'];
        $tipofd = $_POST['tipofd'];
        $cnpj = $_POST['cnpj'];

        if (empty($nome) or empty($cnpj) or empty($tipofd)) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "É necessário preencher todos parâmetros";
            echo '</div>';
            die;
        }

        if(strlen($cnpj) > 18){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CNPJ informado é muito grande";
            echo '</div>';
        } else if (strlen($cnpj) < 18){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CNPJ informado é muito pequeno";
            echo '</div>';
        } else {
            $Empresa = new Empresa($nome, $tipofd, $cnpj);
            $EmpresaDAO->inserir($Empresa);
            header("location: ./../View/listagem_empresa.php");
        }
    }
?>