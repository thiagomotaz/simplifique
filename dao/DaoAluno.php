<?php

require_once('../database/Database.php');

class DaoAluno {

    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function adicionarAluno(ModelAluno $aluno) {
        try {
            $nomeAluno = $aluno->getNomeAluno();
            $cpfAluno = $aluno->getCpfAluno();
            $dataAluno = $aluno->getDataAluno();
            $emailAluno = $aluno->getEmailAluno();
            $senhaAluno = $aluno->getSenhaAluno();

            /*adiciona em usuario, dps em aluno*/

            $stmt = $this->conn->prepare("INSERT INTO usuario(nomeUsuario, cpfUsuario, nascimentoUsuario, emailUsuario, senhaUsuario)
                 VALUES (:nome, :cpf, :datax, :email, :senha)");
                
            $stmt->bindparam(":nome", $nomeAluno);
            $stmt->bindparam(":datax", $dataAluno);
            $stmt->bindparam(":cpf", $cpfAluno);
            $stmt->bindparam(":email", $emailAluno);
            $stmt->bindparam(":senha", $senhaAluno);
            $stmt->execute();
            
            //FAZER ISSO COM TRIGGER FUTURAMENTE
            $ultimoId = $this->conn->lastInsertId();
            $stmt2 = $this->conn->prepare("INSERT INTO aluno(idUsuario)
                 VALUES (:id)");
            $stmt2->bindparam(":id", $ultimoId);
            $stmt2->execute();

            if ($stmt->rowCount() > 0 AND $stmt2->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
            
            } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function atualizarAluno(ModelAluno $aluno) {
        try {
            //update user where idprof
            $idAluno = $aluno->getIdAluno();
            $nomeAluno = $aluno->getNomeAluno();
            $cpfAluno = $aluno->getCpfAluno();
            $dataAluno = $aluno->getDataAluno();
            $emailAluno = $aluno->getEmailAluno();
            $senhaAluno = $aluno->getSenhaAluno();


            $stmt = $this->conn->prepare("UPDATE aluno a, usuario u SET u.nomeUsuario = ?, u.cpfUsuario = ?, u.nascimentoUsuario = ?, u.emailUsuario = ?, u.senhaUsuario = ? WHERE a.idAluno = ? AND u.idUsuario = a.idUsuario");

            $stmt->bindparam(1, $nomeAluno);
            $stmt->bindparam(2, $cpfAluno);
            $stmt->bindparam(3, $dataAluno);
            $stmt->bindparam(4, $emailAluno);
            $stmt->bindparam(5, $senhaAluno);
            $stmt->bindparam(6, $idAluno);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function excluirAluno(ModelAluno $aluno) {
        try {
            $id = $aluno->getIdAluno();
            $idAux = null;
            $stmtAux = $this->conn->prepare("SELECT idUsuario FROM aluno WHERE idAluno = ?");
            $stmtAux->bindparam(1, $id);
            $stmtAux->execute();
            while ($rowAuxiliar = $stmtAux->fetch(PDO::FETCH_ASSOC)) {
                $idAux = $rowAuxiliar['idUsuario'];
            }


            $stmt = $this->conn->prepare("DELETE FROM aluno WHERE idAluno = ?");
            $stmt->bindparam(1, $id);
            $stmt->execute();

            $stmt2 = $this->conn->prepare("DELETE FROM usuario WHERE idUsuario = ?");
            $stmt2->bindparam(1, $idAux);
            $stmt2->execute();


            if ($stmt->rowCount() > 0 && $stmtAux->rowCount() > 0 && $stmt2->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
?>