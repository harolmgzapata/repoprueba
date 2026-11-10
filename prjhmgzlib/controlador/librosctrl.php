<?php
  /**
   * @Autor: Harol Mauricio Gómez Zapata
   * @Fecha: 17/09/2026
   * @Descripción: controlador para el modelo
   *              'libros' a la base
   *               de datos
   */  
  require_once "conexionbd.php";
  require_once "../modelo/libros.php";

  class LibrosCtrl {
      private $libroMdl;
      private $conn;  
      // Constructor de la clase principal
      public function __construct() {
          $this->conn = ConexionBD::getConn();
      }  
      // método que retorna todos los registros de la tabla
      // 'libros' CRUD - CReadUD
      public function listar() {
          try {
              $libros = array();
              // se crea la sentencia SQL
              $stmt = $this->conn->prepare("SELECT isbn, titulo, categoria, fecha_pub, precio, portada, cantidad_stock FROM libros");
              // ejecutamos la sentencia
              $stmt->execute();
              // recuperamos los registros (si los hay)
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
              if ($stmt->rowCount() > 0) {
                  foreach ($resultSet as $lib) {
                      $this->libroMdl = new Libros($lib['isbn'], $lib['titulo'], $lib['categoria'], $lib['fecha_pub'], $lib['precio'], $lib['portada'], $lib['cantidad_stock']);
                      $libros[] = $this->libroMdl;
                  }
              }
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
          }  
          return $libros;
      } // fin del método 'listar()'

      // método para consultar un libro
      public function consultarLibro($isbn) {
        $this->libroMdl = null;

        try {
            $sql = "SELECT isbn, titulo, categoria, fecha_pub, precio, portada, cantidad_stock FROM libros WHERE isbn = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($isbn));

            $lib = $stmt->fetch();

            if ($lib) {
                $this->libroMdl = new Libros($lib['isbn'], $lib['titulo'], $lib['categoria'], $lib['fecha_pub'], $lib['precio'], $lib['portada'], $lib['cantidad_stock']);
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
        }

        return $this->libroMdl;
      } // fin del método 'consultarLibro()'
      
      // método para insertar un registro
      public function insertar($libro) {
          $insertado = 0;
          try {
              $stmt = "INSERT INTO libros (isbn, titulo, categoria, fecha_pub, precio, portada, cantidad_stock) VALUES (?, ?, ?, ?, ?, ?, ?)";
              $lib = array($libro->getIsbn(), $libro->getTitulo(), $libro->getCategoria(), $libro->getFechaPub(), $libro->getPrecio(), $libro->getPortada(), $libro->getCantidadStock());

              $insertado = $this->conn->prepare($stmt)->execute($lib);
          } catch(Exception $exc) {
              die("Error: " . $exc->getMessage());
              $insertado = -1;
          }

          return $insertado;
      } // fin del método 'insertar()'

      // método para actualizar un registro
      public function actualizar($libro) {
          $actualizado = 0;
          try {
              $stmt = "UPDATE libros SET titulo = ?, categoria = ?, fecha_pub = ?, precio = ?, portada = ?, cantidad_stock = ?  WHERE isbn = ?";

              $actualizado = $this->conn->prepare($stmt)->execute(array($libro->getTitulo(), $libro->getCategoria(), $libro->getFechaPub(), $libro->getPrecio(), $libro->getPortada(), $libro->getCantidadStock(), $libro->getIsbn()));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $actualizado = -1;
          }

          return $actualizado;
	  } // fin del método 'actualizar()'
      
      // método para eliminar un registro
      public function eliminar($isbn) {
          $eliminado = 0;
          try {
              $stmt = $this->conn->prepare("DELETE FROM libros WHERE isbn = ?");
              $eliminado = $stmt->execute(array($isbn));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $eliminado = -1;
          }
  
          return $eliminado;
      } // fin del método 'eliminar()'
  } // fin de la clase 'librosCtrl'
?>