<?php
    require_once("../../controller/userController.php");
    $obj = new userController();
    $obj->guardar($_POST['nombre']);
?>