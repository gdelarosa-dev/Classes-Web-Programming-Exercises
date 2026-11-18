<?php
//empleados_lista.php
require "Funciones/conecta.php";
$con = conecta();
$sql = "SELECT *
        FROM empleados
        WHERE ELIMINADO = 0";
$res = $con->query($sql);
$num = $res->num_rows;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados</title>

    <style>
        body {
            background-color: #e8f0fe;
            font-family: Arial;
        }

        #contenedor {
            width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid #4a90e2;
        }

        #titulo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        #crear {
            text-align: right;
            margin-bottom: 15px;
        }

        .fila {
            border-bottom: 1px solid #cccccc;
        }

        .encabezado {
            background-color: #4a90e2;
            color: white;
            font-weight: bold;
        }

        .celda {
            float: left;
            padding: 8px;
        }

        .c-id       { width: 44px; }
        .c-nombre   { width: 234px; }
        .c-correo   { width: 274px; }
        .c-rol      { width: 84px; }
        .c-accion   { width: 84px; }

        .limpia {
            clear: both;
        }
    </style>
</head>
<body>

    <div id="contenedor">

        <div id="titulo">Listado de empleados (<?php echo $num; ?>)</div>

        <div id="crear">
            <a href="empleados_alta.php">Crear nuevo registro</a>
        </div>

        <!-- Encabezados de la tabla -->
        <div class="fila encabezado">
            <div class="celda c-id">ID</div>
            <div class="celda c-nombre">Nombre completo</div>
            <div class="celda c-correo">Correo</div>
            <div class="celda c-rol">Rol</div>
            <div class="celda c-accion">Ver detalle</div>
            <div class="celda c-accion">Editar</div>
            <div class="celda c-accion">Eliminar</div>
            <div class="limpia"></div>
        </div>

        <?php
        // Una fila por cada empleado
        while ($row = $res->fetch_array()) {

            $ID     = $row["ID"];
            $NOMBRE = $row["NOMBRE"] . ' ' . $row["APELLIDOS"];
            $CORREO = $row["CORREO"];
            $ROL    = $row["ROL"];

            $ROL_TXT = ($ROL == 1) ? 'Gerente' : 'Ejecutivo';

            echo "<div class='fila'>";
            echo "<div class='celda c-id'>$ID</div>";
            echo "<div class='celda c-nombre'>$NOMBRE</div>";
            echo "<div class='celda c-correo'>$CORREO</div>";
            echo "<div class='celda c-rol'>$ROL_TXT</div>";
            echo "<div class='celda c-accion'></div>";
            echo "<div class='celda c-accion'></div>";
            echo "<div class='celda c-accion'></div>";
            echo "<div class='limpia'></div>";
            echo "</div>";

        }
        ?>

    </div>

</body>
</html>
