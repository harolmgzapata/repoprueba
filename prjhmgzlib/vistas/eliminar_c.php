<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 22/09/2026
 * @Descripción: Vista para eliminar un cliente de la 
 *               tabla de la base de datos 
*/

  require_once "../controlador/clientesctrl.php";
  $clientesCtrl = new ClientesCtrl();

  if (isset($_POST['id']) && !empty($_POST['id'])) {
      $idCliente = $_POST['id'];
      $eliminado = $clientesCtrl->eliminar($idCliente);

      if ($eliminado > 0) {
          header('location: crud_c.php');
          exit();
      } else {
          echo("Algo ha salido mal ...");
      }
  } else {
      if (empty($_GET['id'])) {
          header('location: 404.php');
          exit();
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
</head>
<body>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="hidden" value="<?= trim($_GET['id']) ?>" name="id">
    <p>Está segur@ que desea eliminar este cliente?</p>
    <p>
      <input type="submit" value="Sí">
      <a href="../">No</a>
    </p>
  </form>
</body>
</html>