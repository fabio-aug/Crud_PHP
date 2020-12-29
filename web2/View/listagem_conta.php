<?php
require_once dirname(__FILE__)."./../Model/pessoa_dao.php";
require_once dirname(__FILE__)."./../Model/empresa_dao.php";
require_once dirname(__FILE__)."./../Model/conta_dao.php";
// Cria o DAO e cria a variável com as categorias do banco
$PessoaDAO = new PessoaDAO();
$Pessoas = $PessoaDAO->buscarTodos();

$EmpresaDAO = new EmpresaDAO();
$Empresas = $EmpresaDAO->buscarTodos();

$ContaDAO = new ContaDAO();
$Contas = $ContaDAO->buscarTodos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD - 2 SEMANA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-grid.min.css" integrity="sha512-pkOzvsY+X67Lfs6Yr/dbx+utt/C90MITnkwx8X5fyKkBorWHJLlR3TmgNJs83URAR0GdejZZnjZdgYjzL/mtcQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-reboot.min.css" integrity="sha512-gl/07tE1atRY5leOa5GtQa/pclV529xEP5cDTIdU1rj7vDh4KKz3nHrP7DsTBx3F++ihOqZGdcRTfOvrU/JF4g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./../index.php">
            <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            CRUD
        </a>
    </nav>

    <! -- LISTAGEM/CRUD CONTAS -->

    <div style="text-align:center;margin-top:30px;margin-bottom:15px;">
        <h1> Listagem de Contas </h1>
        <a href="./create_conta.php" class="btn btn-danger">Cadastrar Conta</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome Titular</th>
                <th scope="col">Numero</th>
                <th scope="col">Saldo</th>
                <th scope="col">Empresa</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($Contas as $czin) {
                    echo "<tr>";
                    echo "<td>{$PessoaDAO->buscarPorCpf($czin->getCpf())->getNome()}</td>";
                    echo "<td>{$czin->getNumero()}</td>";
                    echo "<td>{$czin->getSaldo()}</td>";
                    try {
                        echo "<td>{$EmpresaDAO->buscarPorCnpj($czin->getCnpj())->getNome()}</td>";
                    } catch(Exception $ex) {
                        echo "<td> </td>";
                    }
                    echo "<td>";
                    echo "<a style='margin: 8px;' href='./update_conta.php?num={$czin->getNumero()}'>Alterar</a>";
                    echo "<a href='./../Controller/delete_conta_controller.php?num={$czin->getNumero()}'>Excluir</a>";
                    echo "</td></tr>";
                }
            ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>
</body>

</html>