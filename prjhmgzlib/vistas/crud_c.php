<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Uso de los modelos del proyecto MVC 
*/

// importar los archivos que contienen los modelos de las tablas
// de la base de datos
// require "modelo/clientes.php";
require_once "../controlador/clientesctrl.php";

$ctrlClientes = new ClientesCtrl();
$clientes = $ctrlClientes->listar();


// $conn = ConexionBD::getConn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>
    <style type="text/css">
        .error{
            color: rgb(128, 2, 2);
        }
    </style>
</head>
<body>
  <a href="insertar_c.php" class="btn btn-outline-success">Agregar Cliente</a>
  <table class="table table-success table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>IDENTIFICACIÓN</th>
        <th>NOMBRE</th>
        <th>CELULAR</th>
        <th>DIRECCIÓN</th>
        <th>CORREO</th>
        <th>ACCIONES</th>
        <!-- <th></th> -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clientes as $c) { ?>
        <tr>
          <td><?= $c->getIdCliente() ?></td>
          <td><?= $c->getIdentificacion() ?></td>
          <td><?= $c->getNombre() . " " . $c->getApellidos() ?></td>
          <td><?= $c->getCelular() ?></td>
          <td><?= $c->getDireccion() ?></td>
          <td><?= $c->getCorreo() ?></td>
          <td>
            <a href="editar_c.php?id=<?= $c->getIdCliente() ?>"><span><ion-icon name="create-outline"></ion-icon></span></a>
            <a href="eliminar_c.php?id=<?= $c->getIdCliente() ?>"><span><ion-icon name="trash-outline"></ion-icon></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
</body>
</html>