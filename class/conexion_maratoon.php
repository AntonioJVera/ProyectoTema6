<?php

require_once("class/corredor.php");
require_once("class/conexion.php");


    class Conexion_maratoon extends Conexion{
        public function getCorredores(){
            try {
                $sql = "SELECT 
                    corredores.id,
                    corredores.nombre,
                    corredores.apellidos,
                    corredores.ciudad,
                    corredores.email,
                    corredores.edad,
                    categorias.nombreCorto as categoria,
                    clubs.nombreCorto as club
                    FROM Corredores
                 INNER JOIN categorias ON corredores.id_categoria = categorias.id
                 INNER JOIN clubs ON corredores.id_club = clubs.id
                 ORDER BY id ASC";
                $result = $this->pdo->prepare($sql);
                $result->setFetchMode(PDO::FETCH_OBJ);
                $result->execute();

                return $result;

            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                echo "Mensaje Error ".$e->getMessage();
                echo "<br>";
                echo "Código de Error".$e->getCode();
                echo "<br>";
                echo "Fichero ".$e->getFile();
                echo "<br>";
                echo "Línea ".$e->getLine();
                exit($e->getMessage());
            }
                
        }

        public function getCorredor($id){
            try{ 
            $sql = "SELECT * FROM maratoon.Corredores WHERE id = :id limit 1 ";
            $result = $this->pdo->prepare($sql);

            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Corredor');
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();

            return $result->fetch();
            } catch (PDOException $e){
            echo "DETALLES DEL ERROR: <br>";
            echo "Mensaje Error ".$e->getMessage();
            echo "<br>";
            echo "Código de Error".$e->getCode();
            echo "<br>";
            echo "Fichero ".$e->getFile();
            echo "<br>";
            echo "Línea ".$e->getLine();
            exit($e->getMessage());
            }

        }

        public function getCategorias() {
            try {
                $sql = "SELECT id, nombreCorto FROM maratoon.categorias ORDER BY id";
    
                $stmt = $this->pdo->prepare($sql);
    
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                return $stmt;
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }

        public function getClubs() {
            try {
                $sql = "SELECT id, nombre FROM maratoon.clubs ORDER BY id";
    
                $stmt = $this->pdo->prepare($sql);
    
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                return $stmt;
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }

        public function crear (Corredor $corredor) {
            try {
                $id = $corredor->getId();
                $nombre = $corredor->getNombre();
                $apellidos = $corredor->getApellidos();
                $ciudad = $corredor->getCiudad();
                $fechaNacimiento = $corredor->getFechaNacimiento();
                $sexo = $corredor->getSexo();
                $email = $corredor->getEmail();
                $dni = $corredor->getDni();
                $edad = $corredor->getEdad();
                $id_categoria = $corredor->getId_categoria();
                $id_club = $corredor->getId_club();
    
                $sql = "INSERT INTO maratoon.Corredores VALUES (
                    null,
                    :nombre,
                    :apellidos,
                    :ciudad,
                    :fechaNacimiento,
                    :sexo,
                    :email,
                    :dni,
                    :edad,
                    :id_categoria,
                    :id_club
                    )";
    
                $stmt = $this->pdo->prepare($sql);
    
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 20);
                $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR, 45);
                $stmt->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
                $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
                $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR, 1);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':dni', $dni, PDO::PARAM_STR, 9);
                $stmt->bindParam(':edad', $edad, PDO::PARAM_STR);
                $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
                $stmt->bindParam(':id_club', $id_club, PDO::PARAM_INT);
                    
                
                $stmt->execute();
                
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }

        public function eliminar($id) {
            $deletesql = "DELETE FROM Corredores WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($deletesql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        public function actualizar(Corredor $corredor) {
            try {
                $id = (int) $corredor->getId();
                $nombre = $corredor->getNombre();
                $apellidos = $corredor->getApellidos();
                $ciudad = $corredor->getCiudad();
                $fechaNacimiento = $corredor->getFechaNacimiento();
                $sexo = $corredor->getSexo();
                $email = $corredor->getEmail();
                $dni = $corredor->getDni();
                $edad = $corredor->getEdad();
                $id_categoria = (int) $corredor->getId_categoria();
                $id_club = (int) $corredor->getId_club();
    
                $updatesql = "UPDATE maratoon.Corredores SET
                    nombre = :nombre,
                    apellidos = :apellidos,
                    ciudad = :ciudad,
                    fechaNacimiento = :fechaNacimiento,
                    sexo = :sexo,
                    email = :email,
                    dni = :dni,
                    edad = :edad,
                    id_categoria = :id_categoria,
                    id_club = :id_club
                    WHERE
                        id = :id
                        LIMIT 1";
    
                $stmt = $this->pdo->prepare($updatesql);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 30);
                $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR, 50);
                $stmt->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
                $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
                $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR, 1);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':dni', $dni, PDO::PARAM_STR, 9);
                $stmt->bindParam(':edad', $edad, PDO::PARAM_STR);
                $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
                $stmt->bindParam(':id_club', $id_club, PDO::PARAM_INT);
                    
                
                $stmt->execute();
                
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }


        public function ordenarCorredores($criterio) {
            try {
                $sql = "SELECT 
                    corredores.id,
                    corredores.nombre,
                    corredores.apellidos,
                    corredores.ciudad,
                    corredores.email,
                    corredores.edad,
                    categorias.nombreCorto as categoria,
                    clubs.nombreCorto as club
                    FROM Corredores
                 INNER JOIN categorias ON corredores.id_categoria = categorias.id
                 INNER JOIN clubs ON corredores.id_club = clubs.id
                 ORDER BY $criterio ASC";
                $result = $this->pdo->prepare($sql);
                $result->setFetchMode(PDO::FETCH_OBJ);
                $result->execute();

                return $result;
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }

        public function filtrarCorredores($expresion) {
            try {
                $sql = "SELECT 
                    corredores.id,
                    corredores.nombre,
                    corredores.apellidos,
                    corredores.ciudad,
                    corredores.email,
                    corredores.edad,
                    categorias.nombreCorto as categoria,
                    clubs.nombreCorto as club
                    FROM Corredores
                 INNER JOIN categorias ON corredores.id_categoria = categorias.id
                 INNER JOIN clubs ON corredores.id_club = clubs.id WHERE 
                corredores.id LIKE '%".$expresion."%' OR 
                corredores.nombre LIKE '%".$expresion."%' OR 
                corredores.apellidos LIKE '%".$expresion."%' OR 
                corredores.ciudad LIKE '%".$expresion."%' OR 
                corredores.email LIKE '%".$expresion."%' OR 
                corredores.edad LIKE '%".$expresion."%' OR 
                categorias.nombreCorto LIKE '%".$expresion."%' OR
                clubs.nombreCorto LIKE '%".$expresion."%'";
    
                $result = $this->pdo->prepare($sql);
                $result->setFetchMode(PDO::FETCH_OBJ);
                $result->execute();

                return $result;
    
            } catch (PDOException $e){
                echo "DETALLES DEL ERROR: <br>";
                        echo "Mensaje Error ".$e->getMessage();
                        echo "<br>";
                        echo "Código de Error".$e->getCode();
                        echo "<br>";
                        echo "Fichero ".$e->getFile();
                        echo "<br>";
                        echo "Línea ".$e->getLine();
            }
        }
    
    }

?>