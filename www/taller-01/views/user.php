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
            require_once('../api/models/UserModel.php');
            require_once("../api/settings/Dbconection.php");
            require_once('../api/controller/UserController.php');
            // crear instancia del controlador
            $controller = new UserController();
            // llamar al método para obtener los datos
            $personas = $controller->index();
            // recorrer los datos y mostrarlos en la tabla
            foreach ($personas as $persona) {
                echo "<tr>";
                echo "<td>".$persona->identificacion."</td>";
                echo "<td>".$persona->name."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
