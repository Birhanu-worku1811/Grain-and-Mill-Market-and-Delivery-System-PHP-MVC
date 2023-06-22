<?php

class Database{
    public static $dbConn;
    public function __construct(){
        try {
            $string = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;
            self::$dbConn = new PDO($string, DB_USER, DB_PASSWORD);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance(){
        if (self::$dbConn){
            return self::$dbConn;
        }
        return $instance = new self();
    }

    //reading database
    public function read($query, $data = array()){
        $stmt = self::$dbConn->prepare($query);
        $result = $stmt->execute($data);
        if ($result) {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data)) {
                return $data;
            }
        }
        return false;
    }

    //writting database
    public function write($query, $data= array()){
        $stmt = self::$dbConn->prepare($query);
        $result = $stmt->execute($data);
        if ($result) {
            return true;
        }
        return false;
    }
}
$db = Database::getInstance();
