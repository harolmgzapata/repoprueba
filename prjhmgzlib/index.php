<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>
<body>
  <header>
    <h1>Librería HMGZ</h1>
    <p>¡Tu universo a un libro!</p>
  </header>
  <nav class="topnav" id="myTopnav">
    <ul>
      <li><a href="#"><ion-icon name="home-outline"></ion-icon>&nbsp;INICIO</a></li>
      <li><a href="#"><ion-icon name="contract-outline"></ion-icon>&nbsp;SERVICIOS</a></li>
      <li><a href="#"><ion-icon name="code-working-outline"></ion-icon>&nbsp;PROYECTOS</a></li>
      <li><a href="#"><ion-icon name="people-circle-outline"></ion-icon>&nbsp;CONTACTO</a></li>
      <li><a href="vistas/crud_c.php"><ion-icon name="people-outline"></ion-icon>&nbsp;CLIENTES</a></li>
      <li>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
  </nav>
  <main class="contenedor">
    <h2>Servicios</h2>
    <section class="tarjetas">
      <article class="tarjeta">
        <h3>Diseño Web</h3>
        <p>Desarrollo de interfaces modernas y adaptables.</p>
      </article>
      <article class="tarjeta">
        <h3>Desarrollo</h3>
        <p>Implementación de aplicaciones web utilizando HTML, CSS y JavaScript.</p>
      </article>
      <article class="tarjeta">
        <h3>Responsive Design</h3>
        <p>Interfaces adaptadas para computadores, tabletas y móviles.</p>
      </article>
    </section>
  </main>
  <footer><p>© 2026 - Librería HMGZ</p></footer>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="recursos/css/index.css">
  <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</body>
</html>