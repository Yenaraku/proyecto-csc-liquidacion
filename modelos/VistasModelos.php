<?php

    class VistasModelos {
        /* ------ Modelo para obtener las vistas ------ */

        protected static function obtener_vistas_modelo ($vistas) {
            $ListaBlanca=["daschboard","parametros","PlantaProceso","producto","tercerodireccion","tercero","tipoanimal","usuariotipo","usuario"];
            if (in_array($vistas, $ListaBlanca)) {
               if (is_file("./vistas/contenido/".$vistas."-view.php")) {
                    $contenido="./vistas/contenido/".$vistas."-view.php";
               }else {
                    $contenido="404";
               }
            }elseif ($vistas=="login" || $vistas=="index") {
                $contenido="login";
            }else {
                $contenido="404";
            }
            return $contenido;
        }
    }