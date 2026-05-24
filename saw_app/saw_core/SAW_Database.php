<?php
class SAW_Database
{
    private $SAW_Handler;
    private $SAW_Statement;
    public function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->SAW_Handler = new PDO($dsn, DB_USER, DB_PASS, $option);
            $this->SAW_Handler = new PDO($dsn, DB_USER, DB_PASS, $option);
        } catch (PDOException $error){
            die($error->getMessage());
        }
    }
    public function query($querySAW_Database)
    {
        $this->SAW_Statement = $this->SAW_Handler->prepare($querySAW_Database);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            $type = match (true) {
            is_int($value)  => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default         => PDO::PARAM_STR,
            };
        }
        $this->SAW_Statement->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->SAW_Statement->execute();
    }
    public function resultset()
    {
        $this->execute();
        return $this->SAW_Statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->SAW_Statement->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->SAW_Statement->rowCount();
    }
}