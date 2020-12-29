<?php
    require_once dirname(__FILE__)."./../Model/pessoa_dao.php";

    $PessoaDAO = new PessoaDAO();

    $cpf = $_GET["cpf"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];

        if (empty($nome)) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "É necessário preencher todos parâmetros";
            echo '</div>';
            die;
        }

        $pessoa = new Pessoa($nome, $cpf);
        $PessoaDAO->atualizar($pessoa);
        header("location: ./../View/listagem_pessoa.php");
    }
?>