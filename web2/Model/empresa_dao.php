<?php
    require_once dirname(__FILE__)."/empresa.php";
    require_once dirname(__FILE__)."/banco.php";
    class EmpresaDAO {
        /**
        * Recupera todos as Pessoas existentes no banco de dados
        */
        public function buscarTodos() {
            global $conn;
            $qry = $conn->query("SELECT * FROM empresa");
            $items = array();
            while($linha = $qry->fetch()) {
                $items[] = new Empresa($linha["nome"], $linha["tipofd"], $linha["cnpj"]);
            }
            return $items;
        }

        public function buscarPorCnpj($cnpj) {
            global $conn;
            $qry = $conn->prepare("SELECT * FROM empresa WHERE cnpj=:cnpj");
            $qry->bindParam(":cnpj", $cnpj);
            $qry->execute();
            $item = $qry->fetch();
            if($item == null) {
                throw new Exception("Código {$cnpj} não existe no sistema.");
            }
            // Retorna a empresa criada
            return new Empresa($item["nome"], $item["tipofd"], $item["cnpj"]);
        }

        public function inserir(Empresa $empresa) {
            global $conn;
            $qry = $conn->prepare("INSERT INTO empresa(nome,tipofd,cnpj) VALUES(:nome,:tipofd,:cnpj)");
            // Bind
            $nome = $empresa->getNome();
            $qry-> bindParam(':nome', $nome, PDO::PARAM_STR);
            $tipofd = $empresa->getTipofd();
            $qry-> bindParam(':tipofd', $tipofd, PDO::PARAM_STR);
            $cnpj = $empresa->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }

        public function atualizar(Empresa $empresa) {
            global $conn;

            $qry = $conn->prepare("UPDATE empresa SET nome=:nome WHERE cnpj=:cnpj");
            $nome = $empresa->getNome();
            $qry-> bindParam(':nome', $nome, PDO::PARAM_STR);
            $cnpj = $empresa->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            $qry->execute();

            $qry = $conn->prepare("UPDATE empresa SET tipofd=:tipofd WHERE cnpj=:cnpj");
            $tipofd = $empresa->getTipofd();
            $qry-> bindParam(':tipofd', $tipofd, PDO::PARAM_STR);
            $cnpj = $empresa->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            $qry->execute();
        }

        public function excluir(Empresa $empresa) {
            global $conn;
            $qry = $conn->prepare("DELETE FROM empresa WHERE cnpj=:cnpj");
            // Bind
            $cnpj = $empresa->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }
    }
?>