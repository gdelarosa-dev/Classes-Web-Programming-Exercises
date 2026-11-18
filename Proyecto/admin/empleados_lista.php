<?php
//empleados_lista.php
require "funciones/conecta.php";
$con = conecta();
$sql = "SELECT *
        FROM empleados
        WHERE ELIMINADO = 0";
$res = $con->query($sql);
$num = $res->num_rows;
?>
<html>
//<html lang="en">
<head>
    //<meta charset="UTF-8">
    //<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados</title>
</head>
<body>
    <div>Lista de empleados (<?php echo $num;?>)</div>
    <?php
    while ($row = $res->fetch_array()) {

        $ID = $row["ID"];
        $NOMBRE = $row["NOMBRE"].' '.$row["APELLIDOS"];
        $CORREO = $row["CORREO"];
        echo "$ID $NOMBRE $CORREO <br>"; 

    }
    ?>
</body>
</html>
