<?php

    if ($peticionAjax) {
        require_once "../config/SERVER.PHP";
    }else {
        require_once "./config/SERVER.PHP";
    }

    class mainModel{

        /* ------ Funcion para conectar a la Base de datos ------ */
        protected static function conectar(){
            $conexion = new PDO(SGGB, USER, PASS);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }

        /* ------ Funcion para ejecutar consultas simples ----*/
            protected static function ejecutar_consulta_simple($consulta){
                $sql=self::conectar()->prepare($consulta);
                $sql->execute();
                return $sql;
            }
        
    
            /* ------ Función de Hash encriptar cadenas ----*/
        public function encryption($string){ 
            /* ------ publico por lo que lo utilizaremos en una vista----*/
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

         /* ------ desencriptar cadenas ----*/
		public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

        /* ----- Función para generar codigos aleatorios----*/
        protected static function generar_codigo_aleoatorio($letra,$longitud,$numero){
            for($i=1; $i<=$longitud; $i++)
            {
                $aleatorio=rand(0,9);
                $letra.=$aleatorio;
            }
            return $letra."-".$numero;
        }

        /* -----Función para limpiar cadenas ----*/
        protected static function limpiar_cadena($cadena){
            $cadena=trim($cadena);
            $cadena=stripcslashes($cadena);
            $cadena=str_ireplace("<script>", "", $cadena);
            $cadena=str_ireplace("</script>", "", $cadena);
            $cadena=str_ireplace("<script type=>", "", $cadena);
            $cadena=str_ireplace("SELECT * FROM", "", $cadena);
            $cadena=str_ireplace("DELETE FROM", "", $cadena);
            $cadena=str_ireplace("INSERT INTO", "", $cadena);
            $cadena=str_ireplace("DROP TABLE", "", $cadena);
            $cadena=str_ireplace("DROP DATABASE", "", $cadena);
            $cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
            $cadena=str_ireplace("SHOW TABLES", "", $cadena);
            $cadena=str_ireplace("SHOW DATABASES", "", $cadena);
            $cadena=str_ireplace("<?PHP", "", $cadena);
            $cadena=str_ireplace("?>", "", $cadena);
            $cadena=str_ireplace("--", "", $cadena);
            $cadena=str_ireplace(">", "", $cadena);
            $cadena=str_ireplace("<", "", $cadena);
            $cadena=str_ireplace("[", "", $cadena);
            $cadena=str_ireplace("]", "", $cadena);
            $cadena=str_ireplace("^", "", $cadena);
            $cadena=str_ireplace("==", "", $cadena);
            $cadena=str_ireplace(";", "", $cadena);
            $cadena=str_ireplace("::", "", $cadena);
            $cadena=trim($cadena);
            $cadena=stripcslashes($cadena);
            
            return $cadena;
        }
        
        /* -----Función para verificar los datos ----*/
        protected static function verificar_datos($filtro, $cadena){
            if (preg_match("/^".$filtro."$/", $cadena)) {
                return false;
            }else {
               return true;
            }
        }

         /* -----Función para fechas ----*/
         protected static function verificar_fecha($fecha, $cadena){
            $valores=explode('-', $fecha);

            if (count($valores)==3 && checkdate($valores[1], $valores[2], $valores[0])) {
                return false;
            }else {
               return true;
            }
        }
    }