<?php
    require_once dirname(__FILE__)."./../Model/pessoa_dao.php";

    $PessoaDAO = new PessoaDAO();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];

        if (empty($nome) or empty($cpf)) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "É necessário preencher todos parâmetros";
            echo '</div>';
            die;
        }

        if(strlen($cpf) > 14){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CPF informado é muito grande";
            echo '</div>';
        } else if (strlen($cpf) < 14){
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;margin-top:20px;">';
            echo "ERRO: O CPF informado é muito pequeno";
            echo '</div>';
        } else {
            $pessoa = new Pessoa($nome, $cpf);
            $PessoaDAO->inserir($pessoa);
            header("location: ./../View/listagem_pessoa.php");
        }
    }
?>