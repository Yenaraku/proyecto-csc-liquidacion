<?php
    $peticionAjax=true;

    require_once "../config/App.php";


    if(isset($_POST['opcion']) && !empty($_POST['opcion'])){
        /*--- Intancia al controlador ----*/
        require_once "../controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();
        $ins_usuario->opcion_usuario_controlador($_POST['opcion']);
        
    }else {
        session_start(['name'=>'SDC']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit();
    }
?>