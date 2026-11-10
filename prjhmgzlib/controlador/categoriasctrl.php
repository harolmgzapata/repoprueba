<?php
  /**
   * @categoria: Harol Mauricio Gómez Zapata
   * @Fecha: 28/09/2026
   * @Descripción: controlador para el modelo
   *              'categorias' de la base
   *               de datos
   */ 

  require_once "conexionbd.php";
  require_once "../modelo/categorias.php";

  class CategoriasCtrl {
      private $categoriaMdl;
      private $conn;  
      // Constructor de la clase principal
      public function __construct() {
          $this->conn = ConexionBD::getConn();
      }  
      // método que retorna todos los registros de la tabla
      // 'categorias' CRUD - CReadUD
      public function listar() {
          try {
              $categorias = array();
              // se crea la sentencia SQL
              $stmt = $this->conn->prepare("SELECT id_categoria, categoria FROM categorias");
              // ejecutamos la sentencia
              $stmt->execute();
              // recuperamos los registros (si los hay)
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
              if ($stmt->rowCount() > 0) {
                  foreach ($resultSet as $categoria) {
                      $this->categoriaMdl = new Categorias($categoria['categoria']);
                      $this->categoriaMdl->setIdCategoria($categoria['id_categoria']);
                      $categorias[] = $this->categoriaMdl;
                  }
              }
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
          }  
          return $categorias;
      } // fin del método 'listar()'

      // método para consultar un cliente
      public function consultarCategoria($idCategoria) {
        $this->categoriaMdl = null;

        try {
            $sql = "SELECT id_categoria, categoria FROM categorias WHERE id_categoria = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($idCategoria));

            $categoria = $stmt->fetch();

            if ($categoria) {
                $this->categoriaMdl = new Categorias($categoria['categoria']);
                $this->categoriaMdl->setIdCategoria($categoria['id_categoria']);
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
        }

        return $this->categoriaMdl;
      } // fin del método 'consultarCliente'
      
      // método para insertar un registro
      public function insertar($categoria) {
          $insertado = 0;
          try {
              $stmt = "INSERT INTO categorias (categoria) VALUES (?)";
              $cat = array($categoria->getCategoria());

              $insertado = $this->conn->prepare($stmt)->execute($cat);
          } catch(Exception $exc) {
              die("Error: " . $exc->getMessage());
              $insertado = -1;
          }

          return $insertado;
      } // fin del método 'insertar()'

      // método para actualizar un registro
      public function actualizar($categoria) {
          $actualizado = 0;
          try {
              $stmt = "UPDATE categorias SET categoria = ? WHERE id_categoria = ?";

              $actualizado = $this->conn->prepare($stmt)->execute(array($categoria->getCategoria(), $categoria->getIdCategoria()));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $actualizado = -1;
          }

          return $actualizado;
	  } // fin del método 'actualizar()'
      
      // método para eliminar un registro
      public function eliminar($idCategoria) {
          $eliminado = 0;
          try {
              $stmt = $this->conn->prepare("DELETE FROM categorias WHERE id_categoria = ?");
              $eliminado = $stmt->execute(array($idCategoria));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $eliminado = -1;
          }
  
          return $eliminado;
      } // fin del método 'eliminar()'
  } // fin de la clase 'CategoriasCtrl'
?>