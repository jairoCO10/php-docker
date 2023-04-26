<!DOCTYPE html>
<html>
<head>
    <title>Listado de Personas</title>
</head>
<body>
    <h1>Listado de Personas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        <?php
            require_once('UserModel.php');
            require_once('UserController.php');
            // crear instancia del controlador
            $controller = new UserController($db);
            // llamar al método para obtener los datos
            $personas = json_decode($controller->getPerson());
            // recorrer los datos y mostrarlos en la tabla
            foreach ($personas as $persona) {
                echo "<tr>";
                echo "<td>".$persona->id."</td>";
                echo "<td>".$persona->name."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
