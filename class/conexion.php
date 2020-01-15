<?php
     class Conexion {
         
        protected $pdo;

        public function __construct(){
                try {
                    $host = 'localhost';
                    $dbname = "maratoon";
                    $user = "root";
                    $password = "";
                    $charset = "utf8mb4";
                    $collate = "utf8mb4_unicode_ci";
                    
                    $dsn = "mysql:host=localhost;dbname=$dbname;charset=$charset";

                    $options = [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_PERSISTENT => false,
                            PDO::ATTR_EMULATE_PREPARES => false,
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
                        ];
            

                    $this->pdo = new PDO($dsn, $user, $password, $options);

                }catch (PDOException $e){
                        echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
                        exit();
                    }
                    
        }
    }
?>