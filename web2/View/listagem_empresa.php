<?php
require_once dirname(__FILE__)."./../Model/empresa_dao.php";
// Cria o DAO e cria a variável com as categorias do banco
$EmpresaDAO = new EmpresaDAO();
$Empresas = $EmpresaDAO->buscarTodos();
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

    <div style="text-align:center;margin-top:30px;margin-bottom:15px;">
        <h1> Listagem de Empresas </h1>
        <a href="./create_empresa.php" class="btn btn-danger">Cadastrar Empresa</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Cnpj</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($Empresas as $ezin) {
                    echo "<tr>";
                    echo "<td>{$ezin->getNome()}</td>";
                    echo "<td>{$ezin->getTipofd()}</td>";
                    echo "<td>{$ezin->getCnpj()}</td>";
                    echo "<td>";
                    echo "<a style='margin: 8px;' href='./update_empresa.php?cnpj={$ezin->getCnpj()}'>Alterar</a>";
                    echo "<a href='./../Controller/delete_empresa_controller.php?cnpj={$ezin->getCnpj()}'>Excluir</a>";
                    echo "</td></tr>";
                }
            ?>
        </tbody>
    </table>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>
</body>

</html>