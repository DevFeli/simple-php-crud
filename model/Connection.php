<?php

class Connection{

    public static function getConnection(){

        $host = "";
        $dbname = "";
        $user = "";
        $pass = "";
        
        try{
            
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        }catch(PDOException $e){

            $err = $e->getMessage();
            echo "Erro: $err";
        }

        return $conn;
    }
};