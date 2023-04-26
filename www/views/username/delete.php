<?php
    require_once("../../controller/userController.php");
    $obj = new userController();
    $obj->delete($_GET['id']);

?>