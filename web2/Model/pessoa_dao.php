<?php
    require_once dirname(__FILE__)."/pessoa.php";
    require_once dirname(__FILE__)."/banco.php";
    class PessoaDAO {
        /**
        * Recupera todos as Pessoas existentes no banco de dados
        */
        public function buscarTodos() {
            global $conn;
            $qry = $conn->query("SELECT * FROM pessoa");
            $items = array();
            while($linha = $qry->fetch()) {
                $items[] = new Pessoa($linha["nome"], $linha["cpf"]);
            }
            return $items;
        }

        public function buscarPorCpf($cpf) {
            global $conn;
            $qry = $conn->prepare("SELECT * FROM pessoa WHERE cpf=:cpf");
            $qry->bindParam(":cpf", $cpf);
            $qry->execute();
            $item = $qry->fetch();
            if($item == null) {
                throw new Exception("Código {$cpf} não existe no sistema.");
            }
            // Retorna a pessoa criada
            return new Pessoa($item["nome"], $item["cpf"]);
        }

        public function inserir(Pessoa $pessoa) {
            global $conn;
            $qry = $conn->prepare("INSERT INTO pessoa(nome,cpf) VALUES(:nome,:cpf)");
            // Bind
            $nome = $pessoa->getNome();
            $qry-> bindParam(':nome', $nome, PDO::PARAM_STR);
            $cpf = $pessoa->getCpf();
            $qry-> bindParam(':cpf', $cpf, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }

        public function atualizar(Pessoa $pessoa) {
            global $conn;
            $qry = $conn->prepare("UPDATE pessoa SET nome=:nome WHERE cpf=:cpf");
            // Bind
            $nome = $pessoa->getNome();
            $qry-> bindParam(':nome', $nome, PDO::PARAM_STR);
            $cpf = $pessoa->getCpf();
            $qry-> bindParam(':cpf', $cpf, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }

        public function excluir(Pessoa $pessoa) {
            global $conn;
            $qry = $conn->prepare("DELETE FROM pessoa WHERE cpf=:cpf");
            // Bind 09876543210987
            $cpf = $pessoa->getCpf();
            $qry-> bindParam(':cpf', $cpf, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }
    }
?>