<?php
    require_once "./config/App.php";
    require_once "./controladores/VistasControlador.php";

    $plantilla = new VistasControlador();
    $plantilla -> obtener_plantilla_controlador();

?>