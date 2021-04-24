<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Dashboard - CSC APP</title>
        <?php
            /*---- barra links -----*/
            include "./vistas/inc/link.php";
        ?>
    </head>
    <body class="nav-fixed">
        <?php
            $peticionAjax=false;
            require_once "./controladores/VistasControlador.php";
            $IV = new VistasControlador();
            $vistas = $IV-> obtener_vistas_controlador();
            if ($vistas=="login" || $vistas=="404") {
                require_once "./vistas/contenido/".$vistas."-view.php";
            }else {
                # code...
        ?>
        <?php
        /*---- barra superior -----*/
            include "./vistas/inc/navSup.php";
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php
                    /*---- barra superiorlateral -----*/
                    include "./vistas/inc/navLateral.php";
                ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php
                        /*---- barra contenido de la pagina-----*/
                        include $vistas;
                    ?>
                </main>
                <?php
                    /*---- Footer -----*/
                    include "./vistas/inc/footer.php";
                ?>
            </div>
        </div>
        <?php
        }
            /*---- barra Script-----*/
            include "./vistas/inc/script.php";
        ?>
    </body>
</html>