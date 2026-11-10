<?php
  /**
   * @Autor: Harol Mauricio Gómez Zapata
   * @Fecha: 17/09/2026
   * @Descripción: controlador para el modelo
   *              'clientes' a la base
   *               de datos
   */  
  require_once "conexionbd.php";
  require_once "../modelo/clientes.php";

  class ClientesCtrl {
      private $clienteMdl;
      private $conn;  
      // Constructor de la clase principal
      public function __construct() {
          $this->conn = ConexionBD::getConn();
      }  
      // método que retorna todos los registros de la tabla
      // 'clientes' CRUD - CReadUD
      public function listar() {
          try {
              $clientes = array();
              // se crea la sentencia SQL
              $stmt = $this->conn->prepare("SELECT id_cliente, identificacion, nombre, apellidos, celular, direccion, correo_electronico FROM clientes");
              // ejecutamos la sentencia
              $stmt->execute();
              // recuperamos los registros (si los hay)
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
              if ($stmt->rowCount() > 0) {
                  foreach ($resultSet as $cli) {
                      $this->clienteMdl = new Clientes($cli['identificacion'], $cli['nombre'], $cli['apellidos'], $cli['celular'], $cli['direccion'], $cli['correo_electronico']);
                      $this->clienteMdl->setIdCliente($cli['id_cliente']);
                      $clientes[] = $this->clienteMdl;
                  }
              }
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
          }  
          return $clientes;
      } // fin del método 'listar()'

      // método para consultar un cliente
      public function consultarCliente($idCliente) {
        $this->clienteMdl = null;

        try {
            $sql = "SELECT id_cliente, identificacion, nombre, apellidos, celular, direccion, correo_electronico FROM clientes WHERE id_cliente = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($idCliente));

            $cli = $stmt->fetch();

            if ($cli) {
                $this->clienteMdl = new Clientes($cli['identificacion'], $cli['nombre'], $cli['apellidos'], $cli['celular'], $cli['direccion'], $cli['correo_electronico']);
                $this->clienteMdl->setIdCliente($cli['id_cliente']);
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
        }

        return $this->clienteMdl;
      } // fin del método 'consultarCliente'
      
      // método para insertar un registro
      public function insertar($cliente) {
          $insertado = 0;
          try {
              $stmt = "INSERT INTO clientes (identificacion, nombre, apellidos, celular, direccion, correo_electronico) VALUES (?, ?, ?, ?, ?, ?)";
              $cli = array($cliente->getIdentificacion(), $cliente->getNombre(), $cliente->getApellidos(), $cliente->getCelular(), $cliente->getDireccion(), $cliente->getCorreo());

              $insertado = $this->conn->prepare($stmt)->execute($cli);
          } catch(Exception $exc) {
              die("Error: " . $exc->getMessage());
              $insertado = -1;
          }

          return $insertado;
      } // fin del método 'insertar()'

      // método para actualizar un registro
      public function actualizar($cliente) {
          $actualizado = 0;
          try {
              $stmt = "UPDATE clientes SET identificacion = ?, nombres = ?, apellidos = ?, celular = ?, direccion = ?, correo_electronico = ?  WHERE id_cliente = ?";

              $actualizado = $this->conn->prepare($stmt)->execute(array($cliente->getIdentificacion(), $cliente->getNombres(), $cliente->getApellidos(), $cliente->getCelular(), $cliente->getDireccion(), $cliente->getCorreo(), $cliente->getIdCliente()));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $actualizado = -1;
          }

          return $actualizado;
	  } // fin del método 'actualizar()'
      
      // método para eliminar un registro
      public function eliminar($idCliente) {
          $eliminado = 0;
          try {
              $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id_cliente = ?");
              $eliminado = $stmt->execute(array($idCliente));
          } catch (Exception $exc) {
              die("Error: " . $exc->getMessage());
              $eliminado = -1;
          }
  
          return $eliminado;
      } // fin del método 'eliminar()'
  } // fin de la clase 'ClientesCtrl'
?>