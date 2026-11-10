<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREGAR CLIENTE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .error{
            color: rgb(128, 2, 2);
        }
    </style>    
</head>

<body>
  <div class="container">
    <div class="row d-flex justify-content-center"> <!-- Fila que encierra col-4-->
      <div class="col-12 col-sm-8 col-md-6 col-lg-8 border border-1 p-4 mt-5 rounded-2 shadow-lg">
        <h2>NUEVO CLIENTE</h2>
        <form action="" method="post">
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="">
          <label for="identificacion">Identificación</label>
          <span id="errorIdentif" class="error"></span>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
          <label for="nombre">Nombre</label>
          <span id="errorNombre" class="error"></span>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="">
          <label for="apellidos">Apellidos</label>
          <span id="errorApellidos" class="error"></span>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="celular" name="celular" placeholder="">
          <label for="celular">Celular</label>
          <span id="errorCelular" class="error"></span>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="">
          <label for="direccion">Dirección</label>
          <span id="errorDireccion" class="error"></span>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="correo" name="correo" placeholder="">
          <label for="correo">Correo electrónico</label>
          <span id="errorEmail" class="error"></span>
        </div>
        <button class="btn btn-outline-success" onclick="validarCampos()">Agregar Cliente</button>
        <a href="crud_c.php" class="btn btn-outline-danger col-md-3">Cancelar</a>
      </div>
    </div><!-- cierra segundo div principal -->
    </form>
    <div class="row justify-content-center">
      <div class="col-5">                
        <div id="resultado"></div>                
      </div>                 
    </div><!-- Fin de fila que encierra mt-3 -->
  </div> <!-- Fin del div principal -->
  <script src="js/validacion.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>