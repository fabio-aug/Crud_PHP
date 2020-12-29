<?php
    require_once dirname(__FILE__)."/conta.php";
    require_once dirname(__FILE__)."/banco.php";
    class ContaDAO {
        /**
        * Recupera todos as Pessoas existentes no banco de dados
        */
        public function buscarTodos() {
            global $conn;
            $qry = $conn->query("SELECT * FROM conta");
            $items = array();
            while($linha = $qry->fetch()) {
                $items[] = new Conta($linha["saldo"], $linha["numero"], $linha["cpf"],$linha["cnpj"]);
            }
            return $items;
        }

        public function buscarPorNumero($numero) {
            global $conn;
            $qry = $conn->prepare("SELECT * FROM conta WHERE numero=:numero");
            $qry->bindParam(":numero", $numero);
            $qry->execute();
            $item = $qry->fetch();
            if($item == null) {
                throw new Exception("Código {$numero} não existe no sistema.");
            }
            // Retorna a conta criada
            return new Conta($item["saldo"], $item["numero"], $item["cpf"], $item["cnpj"]);
        }

        public function inserir(Conta $conta) {
            global $conn;
            $qry = $conn->prepare("INSERT INTO conta(saldo,cpf,cnpj) VALUES(:saldo,:cpf,:cnpj)");
            // Bind
            $saldo = $conta->getSaldo();
            $qry-> bindParam(':saldo', $saldo, PDO::PARAM_STR);
            $cpf = $conta->getCpf();
            $qry-> bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $cnpj = $conta->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }

        public function atualizar(Conta $conta) {
            global $conn;

            $qry = $conn->prepare("UPDATE conta SET saldo=:saldo WHERE numero=:numero");
            $saldo = $conta->getSaldo();
            $qry-> bindParam(':saldo', $saldo, PDO::PARAM_STR);
            $numero = $conta->getNumero();
            $qry-> bindParam(':numero', $numero, PDO::PARAM_STR);
            $qry->execute();

            $qry = $conn->prepare("UPDATE conta SET cnpj=:cnpj WHERE numero=:numero");
            $cnpj = $conta->getCnpj();
            $qry-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            $numero = $conta->getNumero();
            $qry-> bindParam(':numero', $numero, PDO::PARAM_STR);
            $qry->execute();
        }

        public function excluir(Conta $conta) {
            global $conn;
            $qry = $conn->prepare("DELETE FROM conta WHERE numero=:numero");
            // Bind
            $numero = $conta->getNumero();
            $qry-> bindParam(':numero', $numero, PDO::PARAM_STR);
            // Executa
            $qry->execute();
        }
    }
?>