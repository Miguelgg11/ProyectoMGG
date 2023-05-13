<!DOCTYPE html>
<html lang="es">
<head>
  <title>Seleccionar</title>
</head>
<body>
  <h1>
    Lectura de la tabla
  </h1>
  <?php
  //Conexion con la base
  //$con = mysqli_init();
  //mysqli_ssl_set($con,NULL,NULL, "C:\Users\Jorge\Documents\php miguel\Ejercicios\Proyecto\ssl\DigiCertGlobalRootCA.crt.pem", NULL, NULL);
  //mysqli_real_connect("basedatos-miguelgg.mysql.database.azure.com", "Miguel", "00mgze61-", "miguel_gomez", 3306, MYSQLI_CLIENT_SSL);

  $conn = mysqli_init();
  mysqli_ssl_set($conn,NULL,NULL, "ssl/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
  mysqli_real_connect($conn, "basedatos-miguelgg.mysql.database.azure.com", "Miguel", "00mgze61-", "miguel_gomez", 3306, MYSQLI_CLIENT_SSL);
  // Componemos la sentencia SQL
  $ssql = "SELECT nombre, DNI, telefono from Datos";

  // Ejecutamos la sentencia SQL
  $result = $conn->query($ssql);
  ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>DNI</th>
      <th>Teléfono</th>
    </tr>
    <?php
      //Mostramos los registros
      while ($row = $result->fetch_array()) {
        print '<tr><td>' . $row["nombre"] . '</td>';
        print '<td>' . $row["DNI"] . '</td>';
        print '<td>' . $row["telefono"] . '</td></tr>';
      }
      $result->free_result();
      $conn->close();
    ?>
  </table>
  <p>
    <a href="config.php">Volver al inico</a>
  </p>
</body>
</html>
