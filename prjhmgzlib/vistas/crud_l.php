<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Uso de los modelos del proyecto MVC 
*/

// importar los archivos que contienen los modelos de las tablas
// de la base de datos
// require "modelo/clientes.php";
require_once "../controlador/librosctrl.php";
require_once "../controlador/categoriasctrl.php";

$librosCtrl = new LibrosCtrl();
$libros = $librosCtrl->listar();
$categoriaCtrl = new CategoriasCtrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .error{
            color: rgb(128, 2, 2);
        }
    </style>
</head>
<body>
  <a href="insertar_l.php" class="btn btn-outline-success">Agregar Libro</a>
  <table class="table table-success table-striped">
    <thead>
      <tr>
        <th>ISBN</th>
        <th>TÍTULO</th>
        <th>CATEGORÍA</th>
        <th>F. PUB.</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>PORTADA</th>
        <th>ACCIONES</th>
        <!-- <th></th> -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($libros as $l) { ?>
        <tr>
          <td><?= $l->getIsbn() ?></td>
          <td><?= $l->getTitulo() ?></td>
          <td><?= $categoriaCtrl->consultarCategoria($l->getCategoria())->getCategoria() ?></td>
          <td><?= $l->getFechaPub() ?></td>
          <td><?= $l->getPrecio() ?></td>
          <td><?= $l->getCantidadStock() ?></td>
          <td><?= $l->getPortada() ?></td>
          <td>
            <a href="editar_l.php?id=<?= $c->getIsbn() ?>"><span><ion-icon name="create-outline"></ion-icon></span></a>
            <a href="eliminar_l.php?id=<?= $c->getIsbn() ?>"><span><ion-icon name="trash-outline"></ion-icon></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
</body>
</html>