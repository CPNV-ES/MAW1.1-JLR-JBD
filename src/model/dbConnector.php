<?php

class DbConnector
{
    private static  $instance;
    public PDO $dbh;

    public static function getInstance() : DbConnector
    {
        if(is_null(self::$instance)){
            self::$instance = new DbConnector();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->open();
    }

    public function open() : void
    {
        try {
            $this->dbh = new PDO('mysql:host=10.229.32.78;dbname=maw11', "JON", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }

    public function execute(string $query) : PDOStatement
    {
        $statement= $this->dbh->prepare($query);
        $statement->execute();
        
        return $statement;
    }

    public function close() : void
    {
        $this->dbh = null;
    }
}
