<?php
  /**
   * @Autor: Harol Mauricio Gómez Zapata
   * @Fecha: 28/09/2026
   * @Descripción: controlador para el modelo
   *              'autores' de la base
   *               de datos
   */ 

  require_once "conexionbd.php";
  require_once "../modelo/autores.php";

  class AutoresCtrl {
      private $autorMdl;
      private $conn;  
      // Constructor de la clase principal
      public function __construct() {
          $this->conn = ConexionBD::getConn();
      }  
      // método que retorna todos los registros de la tabla
      // 'autores' CRUD - CReadUD
      public function listar() {
          try {
              $autores = array();
              // se crea la sentencia SQL
              $stmt = $this->conn->prepare("SELECT id_autor, nombre, apellidos FROM autores");
              // ejecutamos la sentencia
              $stmt->execute();
              // recuperamos los registros (si los hay)
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
              if ($stmt->rowCount() > 0) {
                  foreach ($resultSet as $autor) {
                      $this->autorMdl = new Autores($autor['nombre'], $autor['apellidos']);
                      $this->autorMdl->setIdAutor($autor['id_autor']);
                      $autores[] = $this->autorMdl;
                  }
              }
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
          }  
          return $autores;
      } // fin del método 'listar()'

      // método para consultar un cliente
      public function consultarAutor($idAutor) {
        $this->autorMdl = null;

        try {
            $sql = "SELECT id_autor, nombre, apellidos FROM autores WHERE id_autor = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($idAutor));

            $autor = $stmt->fetch();

            if ($autor) {
                $this->autorMdl = new Autores($autor['nombre'], $autor['apellidos']);
                $this->autorMdl->setIdAutor($autor['id_autor']);
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
        }

        return $this->autorMdl;
      } // fin del método 'consultarCliente'
      
      // método para insertar un registro
      public function insertar($autor) {
          $insertado = 0;
          try {
              $stmt = "INSERT INTO autores (nombre, apellidos) VALUES (?, ?)";
              $aut = array($autor->getNombre(), $autor->getApellidos());

              $insertado = $this->conn->prepare($stmt)->execute($autor);
          } catch(Exception $exc) {
              die("Error: " . $exc->getMessage());
              $insertado = -1;
          }

          return $insertado;
      } // fin del método 'insertar()'

      // método para actualizar un registro
      public function actualizar($autor) {
          $actualizado = 0;
          try {
              $stmt = "UPDATE autores SET nombre = ?, apellidos = ? WHERE id_autor = ?";

              $actualizado = $this->conn->prepare($stmt)->execute(array($autor->getNombre(), $autor->getApellidos(), $autor->getIdAutor()));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $actualizado = -1;
          }

          return $actualizado;
	  } // fin del método 'actualizar()'
      
      // método para eliminar un registro
      public function eliminar($idAutor) {
          $eliminado = 0;
          try {
              $stmt = $this->conn->prepare("DELETE FROM autores WHERE id_autor = ?");
              $eliminado = $stmt->execute(array($idAutor));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $eliminado = -1;
          }
  
          return $eliminado;
      } // fin del método 'eliminar()'
  } // fin de la clase 'AutoresCtrl'
?>