Práctica de INNER JOIN en PHP y MySQL

Descripción

Este proyecto consiste en una página web desarrollada en PHP que muestra la información de estudiantes y sus calificaciones almacenadas en una base de datos MySQL. Se utiliza la sentencia INNER JOIN para combinar los datos de dos tablas (estudiantes y calificaciones) y presentarlos en una tabla combinada.

Funcionamiento

1. Obtención de Datos

El sistema obtiene información de dos tablas en la base de datos:

Tabla estudiantes: Contiene los datos de los estudiantes, como ID, nombre y edad.

Tabla calificaciones: Contiene las calificaciones asignadas a los estudiantes, identificadas por materia.

2. Uso de INNER JOIN

Se utiliza una consulta INNER JOIN para relacionar ambas tablas a través del id_estudiante, obteniendo una tabla combinada con los datos del estudiante y su calificación correspondiente.

SELECT 
    estudiantes.id_estudiante, 
    estudiantes.nombre, 
    estudiantes.edad, 
    calificaciones.materia, 
    calificaciones.calificacion
FROM 
    estudiantes
INNER JOIN 
    calificaciones ON estudiantes.id_estudiante = calificaciones.id_estudiante;

3. Visualización en la Web

Los datos obtenidos se presentan en una página web utilizando Bootstrap para mejorar la apariencia de las tablas:

Tabla de Estudiantes: Muestra la lista de estudiantes.

Tabla de Calificaciones: Muestra las calificaciones asignadas a cada estudiante.

Tabla Combinada: Muestra la información de ambas tablas de manera integrada.

4. Cierre de Conexión

Para evitar consumo innecesario de recursos, se cierra la conexión a la base de datos después de obtener los datos.

mysqli_close($conectar);


Autor: Ulises Millán

Licencia

Este proyecto es de uso libre para fines educativos.
