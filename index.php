<?php
require 'conexion.php';

$sql_estudiantes = "SELECT * FROM estudiantes";
$sql_calificaciones = "SELECT * FROM calificaciones";
$sql_inner_join = "
    SELECT 
        estudiantes.id_estudiante, 
        estudiantes.nombre, 
        estudiantes.edad, 
        calificaciones.materia, 
        calificaciones.calificacion
    FROM 
        estudiantes
    INNER JOIN 
        calificaciones ON estudiantes.id_estudiante = calificaciones.id_estudiante";

$resultado_estudiantes = mysqli_query($conectar, $sql_estudiantes);
$resultado_calificaciones = mysqli_query($conectar, $sql_calificaciones);
$resultado_inner_join = mysqli_query($conectar, $sql_inner_join);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Estudiantes y Calificaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Centrar el contenido de las celdas */
        td, th {
            text-align: center;
            vertical-align: middle;
        }

        /* Reducir el ancho de la columna de ID */
        .col-id {
            width: 10%;
        }

        /* Alinear los títulos de las tablas a la izquierda */
        h2 {
            text-align: left;
        }
    </style>
</head>
<body class="bg-black">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-light">INNER JOIN - Ulises Millán</h1>

        <!-- Tabla de Estudiantes -->
        <h2 class="text-light">Tabla de Estudiantes</h2>
        <table class="table table-bordered table-striped mb-5">
            <thead class="table-primary">
                <tr>
                    <th class="col-id">ID Estudiante</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado_estudiantes)) { ?>
                    <tr>
                        <td><?= $fila['id_estudiante'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['edad'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tabla de Calificaciones -->
        <h2 class="text-light">Tabla de Calificaciones</h2>
        <table class="table table-bordered table-striped mb-5">
            <thead class="table-danger">
                <tr>
                    <th class="col-id">ID Calificación</th>
                    <th>ID Estudiante</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado_calificaciones)) { ?>
                    <tr>
                        <td><?= $fila['id_calificacion'] ?></td>
                        <td><?= $fila['id_estudiante'] ?></td>
                        <td><?= $fila['materia'] ?></td>
                        <td><?= $fila['calificacion'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tabla combinada con INNER JOIN -->
        <h2 class="text-light">Tabla Combinada (INNER JOIN)</h2>
        <table class="table table-bordered table-striped mb-5">
            <thead class="table-success">
                <tr>
                    <th class="col-id">ID Estudiante</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado_inner_join)) { ?>
                    <tr>
                        <td><?= $fila['id_estudiante'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['edad'] ?></td>
                        <td><?= $fila['materia'] ?></td>
                        <td><?= $fila['calificacion'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conectar);
?>
