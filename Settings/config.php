<?php

class Config {

    private static $conn;
    public static function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "native";
        
        try {
            self::$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            self:: $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
    
    public static function select($sql){
        self::connect();
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function insert($sql){
        self::connect();
        try {
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            return 'success' ;
        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }

    }
    
    
}