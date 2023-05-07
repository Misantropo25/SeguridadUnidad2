<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Curso de seguridad de la información</title>
      <style>
         /* Estilos para el encabezado */
         header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
         }

         /* Estilos para el contenido */
         main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
         }

         h1 {
            color: #2c3e50;
            font-size: 36px;
         }

         p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 20px;
         }

         /* Estilos para el pie de página */
         footer {
            background-color: #34495e;
            color: #fff;
            padding: 20px;
            text-align: center;
         }

         /* Estilos para el nombre del usuario */
         #nombre-usuario {
            font-weight: bold;
         }
      </style>
   </head>
   <body>
      <header>
         <nav>
            <ul>
               <li><a href="#">Inicio</a></li>
               <li><a href="#">Perfil</a></li>
                  <?php
                     if (isset($_SESSION['username'])) {
                        echo '<li><a href="#">Logout</a></li>';
                     }
                  ?>
            </ul>
         </nav>
      </header>

      <main>
         <h1>Curso de Seguridad de la Información</h1>
         <p>Bienvenido al curso de seguridad de la información.</p>
         <?php
            if (isset($_SESSION['username'])) {
               echo '<p>Usuario: ' . $_SESSION['username'] . '</p>';
            } else {
               echo '<p>No ha iniciado sesión</p>';
            }
         ?>
         <h2>Introducción</h2>
         <p>La seguridad de la información es un tema crítico en la era digital en la que vivimos. La cantidad de información que se produce, transmite y almacena a diario es enorme, y su protección es esencial para evitar riesgos y pérdidas.</p>

         <h2>Temas del curso</h2>
         <ul>
            <li>Introducción a la seguridad de la información</li>
            <li>Tipos de amenazas y vulnerabilidades</li>
            <li>Técnicas de cifrado y autenticación</li>
            <li>Protección de datos personales</li>
            <li>Políticas y normativas de seguridad</li>
         </ul>

         <h2>Inscripciones</h2>
         <p>Si estás interesado en el curso de seguridad de la información, por favor completa el siguiente formulario:</p>

         <form>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" value="Inscribirse">
         </form>
      </main>

      <footer>
         <p>Curso de seguridad de la información &copy; 2023</p>
      </footer>
   </body>
</html>

<?php
session_start();

   if (!isset($_SESSION['username'])) {
      header('Location: login.php');
      exit();
   }
?>