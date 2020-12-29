<?php
    require_once dirname(__FILE__)."./../Model/conta_dao.php";

    $ContaDAO = new ContaDAO();

    $num = $_GET["num"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $saldo = $_POST['saldo'];
        $cnpj = $_POST['cnpj'];

        if (empty($saldo) or empty($cnpj)) {
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
            $conta = new Conta($saldo, $num, "", $cnpj);
            $ContaDAO->atualizar($conta);
            header("location: ./../View/listagem_conta.php");
        }
    }
?>