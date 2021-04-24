<?php
    if ($peticionAjax) {
        require_once "../modelos/usuarioModelo.php";
    }else {
        require_once "./modelos/usuarioModelo.php";
    }

    class usuarioControlador extends usuarioModelo{
        /*--- Controlador agregar usuario ----*/

        private $id;
        public $nombre;
        public $apellido;
        public $cc;
        public $nusuario;
        public $tipo;
        public $clave;
        public $repetir;
        public $estado;

        public function opcion_usuario_controlador($opcion){
            switch ($opcion) {
                case 'agregar':
                    self::agregar_usuario_controlador();
                    break;
                case 'actualizar':
                    self::actualizar_usuario_controlador();
                    break;
                case 'cambiarEstado':
                    
                    self::cambiar_estado_usuario_controlador();
                    break;
                case 'editar':
                    self::consultar_usuario_controlador();
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        public function validar_campos_usuario_controlador(){
            $this->id       = isset($_POST['id']) ? $_POST['id'] : 0;
            $this->nombre   = isset($_POST['usuario_nombre_reg']) ? $_POST['usuario_nombre_reg'] : '';
            $this->apellido = isset($_POST['usuario_apellido_reg']) ? $_POST['usuario_apellido_reg'] : '';
            $this->cc       = isset($_POST['usuario_cedula_reg']) ? $_POST['usuario_cedula_reg'] : '';
            $this->nusuario = isset($_POST['usuario_usuario_reg']) ? $_POST['usuario_usuario_reg'] : '';
            $this->tipo     = isset($_POST['usuario_Tipo_reg']) ? $_POST['usuario_Tipo_reg'] : '';
            $this->clave    = isset($_POST['usuario_clave_reg']) ? $_POST['usuario_clave_reg'] : '';
            $this->repetir  = isset($_POST['usuario_repetir_reg']) ? $_POST['usuario_repetir_reg'] : '';
            $this->estado   = isset($_POST['usuario_estado_reg']) ? $_POST['usuario_estado_reg'] : '';

            $this->id       = mainModel::limpiar_cadena($this->id);
            $this->nombre   = mainModel::limpiar_cadena($this->nombre);
            $this->apellido = mainModel::limpiar_cadena($this->apellido);
            $this->cc       = mainModel::limpiar_cadena($this->cc);
            $this->nusuario = mainModel::limpiar_cadena($this->nusuario);
            $this->tipo     = mainModel::limpiar_cadena($this->tipo);
            $this->clave    = mainModel::limpiar_cadena($this->clave);
            $this->repetir  = mainModel::limpiar_cadena($this->repetir);
            $this->estado   = mainModel::limpiar_cadena($this->estado);
        }

        public function consultar_usuario_controlador(){
        
            self::validar_campos_usuario_controlador();

            if(!empty($this->id) && ($this->id > 0) ) {
                $conexion=mainModel::conectar();
            
                $consulta = $conexion->query("SELECT id_usuario,nombre,apellido,cedula,nick_usuario,clave_usuario,id_usuario_tipo_fk,estado FROM usuario WHERE id_usuario=$this->id");
                $results  = $consulta->fetchAll(PDO::FETCH_OBJ);

                foreach($results as $result) { 
                    $datos['id_usuario']            = $result->id_usuario;
                    $datos['nombre']                = $result->nombre;
                    $datos['apellido']              = $result->apellido;
                    $datos['cedula']                = $result->cedula;
                    $datos['nick_usuario']          = $result->nick_usuario;
                    $datos['clave_usuario']         = mainModel::decryption($result->clave_usuario);
                    $datos['id_usuario_tipo_fk']    = $result->id_usuario_tipo_fk;
                    $datos['estado']                = $result->estado;
                    $datos += ['vista' => 'usuario'];
                }
                echo json_encode($datos); 
            }
        }

        /*--- Controlador paginar los usuarios ----*/
        public function listar_usuario_controlador(){
        
            $conexion=mainModel::conectar();
            
            $datos = $conexion->query("SELECT id_usuario,nombre,apellido,cedula,nick_usuario,id_usuario_tipo_fk,estado FROM usuario ORDER by id_usuario");
            $results = $datos->fetchAll(PDO::FETCH_OBJ);
            $nregistro = $datos -> rowCount();

            if($nregistro > 0) { 
                // Usaremos el ciclo para mostrar resultados
                foreach($results as $result) {
                    
                    if ($result -> estado == 'A') {
                        $tag = "<span class='badge badge-success'>activo</span>";
                        $button = "<button class='btn btn-datatable btn-icon btn-transparent-dark btn-opcion' title='Cambiar Estado' data-opcion='cambiarEstado' data-id='".$result -> id_usuario."' data-url='".SERVERURL."ajax/usuarioAjax.php'><i class='fa fa-ban'></i></button>";
                        
                    }else{
                        $tag = $tag = "<span class='badge badge-danger'>Inactivo</span>";;
                        $button = "<button class='btn btn-datatable btn-icon btn-transparent-dark btn-opcion' title='Cambiar Estado' data-opcion='cambiarEstado' data-id='".$result -> id_usuario."' data-url='".SERVERURL."ajax/usuarioAjax.php'><i class='fa fa-check'></i></button>";
                    }

                    echo "<tr>";
                    echo "<td>".$result -> id_usuario."</td> 
                    <td>".$result -> nombre." ".$result -> apellido."</td> 
                    <td>".$result -> cedula."</td> 
                    <td>".$result -> nick_usuario."</td>
                    <td>".$result -> id_usuario_tipo_fk."</td>
                    <td>".$tag."</td>
                    <td>
                        <button class='btn btn-datatable btn-icon btn-transparent-dark btn-opcion' title='Editar Usuario' data-opcion='editar' data-id='".$result -> id_usuario."' data-url='".SERVERURL."ajax/usuarioAjax.php'><i class='fa fa-edit'></i></button>
                        <button class='btn btn-datatable btn-icon btn-transparent-dark btn-opcion' title='Cambiar Contraseña' data-opcion='cambiarPwd' data-id='".$result -> id_usuario."' data-url='".SERVERURL."ajax/usuarioAjax.php'><i class='fa fa-key'></i></button>";
                    echo $button;
                    echo "</td>
                    </tr>"; 
                }
            }  
        }/*== Cierre del la función listar usuario controlador ==*/

        public function agregar_usuario_controlador(){
            self::validar_campos_usuario_controlador();
            /*== Comprobar campos vacios ==*/
            if($this->nombre=="" || $this->apellido=="" || $this->cc=="" || $this->nusuario=="" || $this->tipo=="" || $this->clave=="" || $this->repetir==""){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"No has llenado todos los campos que son obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campos vacios ==*/

            /*== Verificar la integridad de los datos ==*/
            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,12}", $this->nombre)) { 
                    $alerta=[
                        "Alerta"=>"simple", 
                        "Titulo"=>"Ocurrio un error inexperado",
                        "Texto"=>"El nombre no coincide con el formato solicitado",
                        "Tipo"=>"error"   
                    ];
                    echo json_encode($alerta);
                    exit();
            }/*== Cierre de verificar campo nombre ==*/

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}", $this->apellido)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El apellido no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campo de apellidos ==*/

            if (mainModel::verificar_datos("[0-9-]{10,10}", $this->cc)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"La cedula no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campos cedula ==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $this->nusuario)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El nombre de Usuario no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verifica nombre de usuario ==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{7,50}", $this->clave)){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las Contraseñas no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar clave==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{7,50}", $this->repetir)){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las Contraseñas no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar el repetir clave ==*/

            /*== Comprobar claves ==*/
            if($this->clave!=$this->repetir){
                
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las constraseñas ingresadas no coinciden",
                    "Tipo"=>"error"
                ];

                echo json_encode($alerta);
                exit();
            }else {
                $password=mainModel::encryption($this->clave);
            }
            
            /*== Coprobar que la cedula no este registrada ==*/
            $check_cedula=mainModel::ejecutar_consulta_simple("SELECT cedula FROM usuario WHERE cedula='$this->cc'");
            if ($check_cedula->rowCount()>0) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"La Cedula ingresado ya se encuentra registrado en el sistema",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();

            }/*== Cierre del chequeo de la cedula ==*/

            $check_user=mainModel::ejecutar_consulta_simple("SELECT nick_usuario FROM usuario WHERE nick_usuario='$this->nusuario'");
            if ($check_user->rowCount()>0) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El nombre de usuario ingresado ya se encuentra registrado en el sistema",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre del chequeo de nombre de usuario ==*/

            $this->estado = ($this->estado=='A') ? 'A' : 'I';

            $datos_usuario_reg=[
                'Nombre'    => $this->nombre,
                'Apellido'  => $this->apellido,
                'Cedula'    => $this->cc,
                'Nick'      => $this->nusuario,
                'Clave'     => $password,
                'TipoUsuario'=>$this->tipo,
                'Estado'    => $this->estado
            ];

            $agregar_usuario=usuarioModelo::agregar_usuario_modelo($datos_usuario_reg);

            if($agregar_usuario->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar", 
                    "Titulo"=>"Usario registrado",
                    "Texto"=>"Los datos del usuario han sido registrados con exito",
                    "Tipo"=>"success"

                ];
            }else {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"NO se ha podido registrar el usuario",
                    "Tipo"=>"error"
                ];
            }
            echo json_encode($alerta);
        }/*== Cierre del la función agregar usuario controlador ==*/



        public function actualizar_usuario_controlador(){
            self::validar_campos_usuario_controlador();
            /*== Comprobar campos vacios ==*/
            if( $this->nombre=="" || $this->apellido=="" || $this->cc=="" || $this->nusuario=="" || $this->tipo=="" || $this->clave=="" || $this->repetir==""){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"No has llenado todos los campos que son obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campos vacios ==*/

            /*== Verificar la integridad de los datos ==*/
            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,12}", $this->nombre)) { 
                    $alerta=[
                        "Alerta"=>"simple", 
                        "Titulo"=>"Ocurrio un error inexperado",
                        "Texto"=>"El nombre no coincide con el formato solicitado",
                        "Tipo"=>"error"   
                    ];
                    echo json_encode($alerta);
                    exit();
            }/*== Cierre de verificar campo nombre ==*/

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}", $this->apellido)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El apellido no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campo de apellidos ==*/

            if (mainModel::verificar_datos("[0-9-]{10,10}", $this->cc)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"La cedula no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar campos cedula ==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $this->nusuario)) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El nombre de Usuario no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verifica nombre de usuario ==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{7,50}", $this->clave)){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las Contraseñas no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar clave==*/

            if (mainModel::verificar_datos("[a-zA-Z0-9]{7,50}", $this->repetir)){
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las Contraseñas no coincide con el formato solicitado",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre de verificar el repetir clave ==*/

            /*== Comprobar claves ==*/
            if($this->clave!=$this->repetir){
                
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"Las constraseñas ingresadas no coinciden",
                    "Tipo"=>"error"
                ];

                echo json_encode($alerta);
                exit();
            }else {
                $password=mainModel::encryption($this->clave);
            }
            
            /*== Coprobar el id de usuario exista ==*/
            $check_id=mainModel::ejecutar_consulta_simple("SELECT cedula FROM usuario WHERE id_usuario='$this->id'");
            if ($check_id->rowCount()<1) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El id del usuario es invalido",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }/*== Cierre del chequeo del id ==*/

            /*== Coprobar que la cedula no este registrada ==*/
            $check_cedula=mainModel::ejecutar_consulta_simple("SELECT cedula FROM usuario WHERE id_usuario<>$this->id AND cedula='$this->cc'");
            if ($check_cedula->rowCount()>0) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"La Cedula ingresado ya se encuentra registrado en el sistema",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();

            }/*== Cierre del chequeo de la cedula ==*/

            $check_user=mainModel::ejecutar_consulta_simple("SELECT nick_usuario FROM usuario WHERE id_usuario<>$this->id AND nick_usuario='$this->nusuario'");
            if ($check_user->rowCount()>0) {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"El nombre de usuario ingresado ya se encuentra registrado en el sistema",
                    "Tipo"=>"error"

                ];

                echo json_encode($alerta);
                exit();
            }/*== Cierre del chequeo de nombre de usuario ==*/

            $this->estado = ($this->estado=='A') ? 'A' : 'I';

            $datos_usuario_reg=[
                'Nombre'    => $this->nombre,
                'Apellido'  => $this->apellido,
                'Cedula'    => $this->cc,
                'Nick'      => $this->nusuario,
                'Clave'     => $password,
                'TipoUsuario'=>$this->tipo,
                'Estado'    => $this->estado,
                'Id'        => $this->id
            ];

            $actualizar_usuario=usuarioModelo::actualizar_usuario_modelo($datos_usuario_reg);

            if($actualizar_usuario->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar", 
                    "Titulo"=>"Usuario ",
                    "Texto"=>"Los datos del usuario han sido actualizado con exito",
                    "Tipo"=>"success"

                ];
            }else {
                $alerta=[
                    "Alerta"=>"simple", 
                    "Titulo"=>"Ocurrio un error inexperado",
                    "Texto"=>"NO se ha podido actualizar el usuario",
                    "Tipo"=>"error"
                ];
            }
            echo json_encode($alerta);
        }

        public function cambiar_estado_usuario_controlador(){
            self::validar_campos_usuario_controlador();
            $consulta=mainModel::ejecutar_consulta_simple("SELECT estado FROM usuario WHERE id_usuario='$this->id'");
            if ($consulta->rowCount()>0) {
                $datos['Id'] = $this->id;
                $results  = $consulta->fetchAll(PDO::FETCH_OBJ);
                foreach($results as $result) { 
                    $datos['Estado'] = ($result->estado)=='A' ? 'I' : 'A';
                }

                $cambiar_estado=usuarioModelo::cambiar_estado_usuario_modelo($datos);

                if($cambiar_estado->rowCount()==1){
                    $alerta=[
                        "Alerta"=>"recargar", 
                        "Titulo"=>"Usuario ",
                        "Texto"=>"El estado del usuario a cambiado",
                        "Tipo"=>"success"
    
                    ];
                }else {
                    $alerta=[
                        "Alerta"=>"simple", 
                        "Titulo"=>"Ocurrio un error inexperado",
                        "Texto"=>"NO se puedo cambiar el estado del usuario",
                        "Tipo"=>"error"
                    ];
                }

                echo json_encode($alerta);
                
            }
        }

    } /*== Cierre del controlador ==*/

?>