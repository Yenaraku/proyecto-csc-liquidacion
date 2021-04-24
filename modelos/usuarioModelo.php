<?php
    require_once "mainModel.php";

    class usuarioModelo extends mainModel{
        /*--- Modelo agregar usuario ----*/

        protected static function agregar_usuario_modelo($datos){
            $sql=mainModel::conectar()->prepare("INSERT INTO usuario(nombre,apellido,cedula,nick_usuario,clave_usuario,id_usuario_tipo_fk,estado) VALUES(:Nombre, :Apellido, :Cedula, :Nick, :Clave, :TipoUsuario, :Estado)");
            
            $sql->bindParam(":Nombre",$datos['Nombre']);
            $sql->bindParam(":Apellido",$datos['Apellido']);
            $sql->bindParam(":Cedula",$datos['Cedula']);
            $sql->bindParam(":Nick",$datos['Nick']);
            $sql->bindParam(":Clave",$datos['Clave']);
            $sql->bindParam(":TipoUsuario",$datos['TipoUsuario']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->execute();
            return $sql;
        }

        protected static function actualizar_usuario_modelo($datos){
            $sql=mainModel::conectar()->prepare("UPDATE usuario SET nombre=:Nombre, apellido=:Apellido, cedula=:Cedula, nick_usuario=:Nick, clave_usuario=:Clave, id_usuario_tipo_fk=:TipoUsuario, estado=:Estado WHERE id_usuario=:Id");
            
            $sql->bindParam(":Nombre",$datos['Nombre']);
            $sql->bindParam(":Apellido",$datos['Apellido']);
            $sql->bindParam(":Cedula",$datos['Cedula']);
            $sql->bindParam(":Nick",$datos['Nick']);
            $sql->bindParam(":Clave",$datos['Clave']);
            $sql->bindParam(":TipoUsuario",$datos['TipoUsuario']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Id",$datos['Id']);
            $sql->execute();
            return $sql;
        }

        protected static function cambiar_estado_usuario_modelo($datos){
            
            $sql=mainModel::conectar()->prepare("UPDATE usuario SET estado=:Estado WHERE id_usuario=:Id");
            
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Id",$datos['Id']);
            $sql->execute();
            return $sql;
        }

    }
?>