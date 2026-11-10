<?php
  /**
   * @Autor: Harol Mauricio Gómez Zapata
   * @Fecha: 28/09/2026
   * @Descripción: controlador para el modelo
   *              'autor_por_libro' de la base
   *               de datos
   */ 

  require_once "conexionbd.php";
  require_once "../modelo/autorlibro.php";

  class AutorPorLibroCtrl {
      private $autorLibroMdl;
      private $conn;  
      // Constructor de la clase principal
      public function __construct() {
          $this->conn = ConexionBD::getConn();
      }  
      // método que retorna todos los registros de la tabla
      // 'autores' CRUD - CReadUD
      public function listar() {
          try {
              $autorlibro = array();
              // se crea la sentencia SQL
              $stmt = $this->conn->prepare("SELECT id_autor, isbn FROM autor_por_libro");
              // ejecutamos la sentencia
              $stmt->execute();
              // recuperamos los registros (si los hay)
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
              if ($stmt->rowCount() > 0) {
                  foreach ($resultSet as $al) {
                      $this->autorLibroMdl = new Autores($al['id_autor'], $al['isbn']);
                      $autorlibro[] = $this->autorlibroMdl;
                  }
              }
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
          }  
          return $autorlibro;
      } // fin del método 'listar()'

      // método para consultar un cliente
      public function consultarAutor($idAutor) {
        try {
            $autorLibro = array();
            $sql = "SELECT id_autor, isbn FROM autor_por_libro WHERE id_autor = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($idAutor));

            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            if ($stmt->rowCount() > 0) {
                foreach ($resultSet as $al) {
                    $this->autorLibroMdl = new AutorPorLibro($al['id_autor'], $al['isbn']);
                    $autorLibro[] = $this->autorLibroMdl;
                }
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
        }

        return $autorLibro;
      } // fin del método 'consultarCliente'
      
      // método para insertar un registro
      public function insertar($autorLibro) {
          $insertado = 0;
          try {
              $stmt = "INSERT INTO autor_por_libro (id_autor, isbn) VALUES (?, ?)";
              $al = array($autorLibro->getIdAutor(), $autor->getIsbn());

              $insertado = $this->conn->prepare($stmt)->execute($al);
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
          $eliminados = 0;
          try {
              $stmt = $this->conn->prepare("DELETE FROM libro_por_autor WHERE id_autor = ?");
              $eliminado = $stmt->execute(array($idAutor));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $eliminados = -1;
          }
  
          return $eliminados;
      } // fin del método 'eliminar()'
  } // fin de la clase 'AutoresCtrl'
?>