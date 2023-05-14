<!DOCTYPE html>
<html lang="es">
<head>
  <title>Seleccionar</title>
</head>
<body>
    <h1>
        Insertando Datos
    </h1>
    <?php
    // Crear el script para que se conecte a la base de datos
    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, "ssl/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, "basedatos-miguelgg.mysql.database.azure.com", "Miguel", "00mgze61-", "miguel_gomez", 3306, MYSQLI_CLIENT_SSL);
    
    $nombre = $_POST["nombre"];
    $DNI = $_POST["DNI"];
    $Telefono = $_POST["telefono"];
    $sql = "INSERT INTO Datos VALUES ('$nombre','$DNI','$Telefono')"; 
    
    $EJECUTAR = $conn->query($sql);
    
    if (!$EJECUTAR){
        print "Hubo un error";
    }else{
        print "Datos guardados correctamente"; 
    }
    ?>
    <p>
        <a href="index.html">Volver al inico</a>
    </p>
</body>
</html>
