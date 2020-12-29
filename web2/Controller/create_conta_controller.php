<?php
    require_once dirname(__FILE__)."./../Model/conta_dao.php";

    $ContaDAO = new ContaDAO();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $saldo = $_POST['saldo'];
        $numero = "";
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];

        if (empty($saldo) or empty($cpf) or empty($cnpj)) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "É necessário preencher todos parâmetros";
            echo '</div>';
            die;
        }

        if(strlen($cnpj) > 18 or strlen($cpf) > 14){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CPF informado é muito grande";
            echo '</div>';
        } else if (strlen($cnpj) < 18 or strlen($cpf) < 14){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CPF informado é muito pequeno";
            echo '</div>';
        } else {
            $Conta = new Conta($saldo, $numero, $cpf, $cnpj);
            $ContaDAO->inserir($Conta);
            header("location: ./../View/listagem_conta.php");
        }
    }
?>