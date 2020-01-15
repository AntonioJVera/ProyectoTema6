<?php 

require_once("class/user.php");
require_once("class/conexion.php");

    class Conexion_users_gestion extends Conexion {
        public function getUsuarios(){
            try {
                $sql = "SELECT * FROM users ORDER BY id ASC";
                $result = $this->pdo->prepare($sql);
                $result->setFetchMode(PDO::FETCH_OBJ);
                $result->execute();

                return $result;

            } catch (PDOException $e){
                
                exit($e->getMessage());
            }
        }

        public function getUsuario($id){
            try { 
                $sql = "SELECT * FROM users WHERE id = :id limit 1 ";
                $result = $this->pdo->prepare($sql);

                $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
                $result->bindParam(":id", $id, PDO::PARAM_INT);
                $result->execute();

                return $result->fetch();

            } catch (PDOException $e){
            
            exit($e->getMessage());

            }

        }

        public function getUsuario_email($email){
            try { 

                $sql = "SELECT * FROM users WHERE email = :email limit 1 ";
                $result = $this->pdo->prepare($sql);

                $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
                $result->bindParam(':email', $email, PDO::PARAM_STR, 50);
                $result->execute();

                return $result->fetch();

            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }

        }

        public function getUserId($id) {
            try {
            $sql = "SELECT * FROM Users WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }  catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit(0);
        }
        }

        public function crear (User $user) {
            try {
                $id = $user->getId();
                $nombre = $user->getName();
                $email = $user->getEmail();
                $pass = $user->getPassword();
                $pass_encriptado = password_hash($pass, CRYPT_BLOWFISH);
               
    
                $insertarsql = "INSERT INTO users VALUES (
                     null,
                    :nombre,
                    :email,
                    :pass,
                    default,
                    default)";
    
                $stmt = $this->pdo->prepare($insertarsql);
    
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
                $stmt->bindParam(':email', $email , PDO::PARAM_STR, 50);
                $stmt->bindParam(':pass', $pass_encriptado, PDO::PARAM_STR, 60) ;
    
                $stmt->execute();
    
            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }
        }

        public function actualizar (Users $users) {
            try {
                $id = (int) $users->getId();
                $nombre = $users->getnombre();
                $email = $users->getEmail();
                $password = $users->getPassword();
    
                $updatesql = "UPDATE users SET 
                    nombre = :nombre,
                    email = :email,
                    password = :password,
                    update_at = :default
                WHERE
                    id = :id
                    LIMIT 1";
    
                $stmt = $this->pdo->prepare($insertarsql);
    
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);
    
                $stmt->execute();
    
            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }
        }

        public function eliminar($id) {
            $deletesql = "DELETE FROM Users WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($deletesql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } 

        public function validarEmail($email) {
            $emailsql = "SELECT * FROM Users WHERE email = :email LIMIT 1";
            $stmt = $this->pdo->prepare($emailsql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        }

        public function validarName($nombre) {
            if ((strlen($nombre) < 5) || (strlen($nombre) > 50)) {
                return false;
            }
            return true;
    
        }

        public function actualizar_columnas($id, $nombre, $email) {
            try {
                $updatesql = "UPDATE users SET
                    name = :nombre,
                    email = :email,
                    update_at = default
                WHERE
                    id = :id    
                LIMIT 1";

                $stmt = $this->pdo->prepare($updatesql);

                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                $stmt->execute();
                
            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }
        }

        public function crear_usuario_perfil($id_perfil) {
            $ultimo_id = $this->pdo->lastInsertId();

            try {
                $insertarsql = "INSERT INTO maratoon.roles_users VALUES (
                    null,
                    :user_id,
                    :role_id,
                    default,
                    default)";

                $stmt = $this->pdo->prepare($insertarsql);

                $stmt->bindParam(':user_id', $ultimo_id, PDO::PARAM_INT);
                $stmt->bindParam(':role_id', $id_perfil, PDO::PARAM_INT);
                $stmt->execute();
            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }
        }

        public function getUserIdPerfil($id) {
            try {
                $selectsql = "SELECT
                                ru.role_id
                            FROM
                                users u
                            INNER JOIN
                                roles_users ru ON u.id = ru.user_id
                            WHERE
                                u.id = :id
                            LIMIT 1";

                $stmt = $this->pdo->prepare($selectsql);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute(); 

                return $stmt->fetch()->role_id;
            }  catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit(0);
            }
        }

        public function getUserPerfil($id_perfil) {
            $selectsql = "SELECT
                            name
                        FROM
                            roles
                        WHERE
                            id = :id
                        LIMIT 1";
            $stmt = $this->pdo->prepare($selectsql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->bindParam(':id', $id_perfil, PDO::PARAM_INT);
            $stmt->execute(); 
            return $stmt->fetch()->name;
        }
    }
?>