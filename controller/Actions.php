<?php

include_once(dirname(__FILE__, 2) . "/model/Connection.php");

class Actions{

    public static function getAll(){

        $conn = Connection::getConnection();

        $stmt = $conn->prepare("SELECT * FROM produtos");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function insert($arr){

        $conn = Connection::getConnection();
        
        $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, qtd) VALUES (?,?,?,?)");
        $stmt->bindValue(1, $arr['nome']);
        $stmt->bindValue(2, $arr['descricao']);
        $stmt->bindValue(3, (float)$arr['preco']);
        $stmt->bindValue(4, $arr['qtd']);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $message = [ 'message' => "Inserido com succeso!", 'status' => 'bg-success'];
        }else{
            $message = [ 'message' => "Falha ao Inserir!", 'status' => 'bg-danger'];
        }

        return $message;
    }

    public static function getOne($id){

        $conn = Connection::getConnection();

        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function update($arr){

        $conn = Connection::getConnection();

        $stmt = $conn->prepare("UPDATE produtos SET nome=?, descricao=?, preco=?, qtd=? WHERE id=?");
        $stmt->bindValue(1,$arr['nome']);
        $stmt->bindValue(2,$arr['descricao']);
        $stmt->bindValue(3,$arr['preco']);
        $stmt->bindValue(4,$arr['qtd']);
        $stmt->bindValue(5,$arr['id']);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $message = ["message" => "Atualizado com sucesso!", "status" => "bg-success"];
        }else{
            $message = ["message" => "Não atualizado!", "status" => "bg-danger"];
        }

        return $message;
    }

    public static function delete($id){

        $conn = Connection::getConnection();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}