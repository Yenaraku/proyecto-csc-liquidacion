//Seleccionar los formularios de las vistas que esten relacionados con la clase formularios_ajax
const formularios_ajax = document.querySelectorAll(".formularios_ajax");
const btnOpcion = document.querySelectorAll(".btn-opcion");

var opcion      = '';
var idRegistro  = '';
var urlAjax     = '';


function enviar_formulario_ajax(e)
{
    e.preventDefault(); //Prevenimos que se redirecione por defecto el action

    
    let data = new FormData(this); //array que contiene todos los datos del input de un formulario

    let method = this.getAttribute("method"); //Obter los datos del atributo method
    let action = this.getAttribute("action"); //Obter los datos del atributo action
    let tipo = this.getAttribute("data-form"); //Obter los datos del atributo data-form


    let encabezados = new Headers(); //Obter los encabezados

    //json o array de datos de configuración que se enviar con fech
    let config = 
    {
        method: method,
        headers: encabezados,
        mode: 'cors', //parametro para pasar el modo.
        cache: 'no-cache', // Como se comportara la cache.
        body: data // Todo los datos del formulario.
    }

    let texto_alerta; // Obtiene el texto de la alerta

    if(tipo==="save")
    {
        texto_alerta="Los datos se guardaran en el sistema.";
    }else if(tipo==="delete")
    {
        texto_alerta="Los datos seran eliminado del sistema.";
    }else if(tipo==="update")
    {
        texto_alerta="Los datos se actualizaran en el sistema.";
    }else if(tipo==="search")
    {
        texto_alerta="Se eliminará el termino de búsqueda y tendrás que escribir una nueva búsqueda.";
    }else
    {
        texto_alerta="¿Quieres realizar la operación solicitada?";
    }

    Swal.fire
    ({
        title: '¿Estás seguro?',
        text: texto_alerta,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => 
    {
        if (result.value){
            fetch(action,config)
            .then(respuesta => respuesta.json())//Respuesta en formato json para mostrar bien las 
            .then(datos =>{ 
                
                console.log(datos);
                return alertas_ajax(datos);
            })
        
        }
    })
}

//Estar pendiente a un evento o escuchando a un evento a escuchar
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});


//función para mostrar las alertas
function alertas_ajax(alerta){
    if(alerta.Alerta==="simple"){
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Tipo,
            confirmButtonText: 'Aceptar'
        });
    }else if(alerta.Alerta==="recargar"){
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Tipo,
            confirmButtonText: 'aceptar'
        }).then((result) => {
            if(result.value){
                location.reload();
            
            }
        });
    }else if(alerta.Alerta==="limpiar"){
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Tipo,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if(result.value){
                document.querySelector(".formularios_ajax").reset();
            }
        });
    }else if(alerta.Alerta==="redireccionar"){
        window.location.href=alerta.URL;
    }
}

/* Evento click de las opciones (agregar, actualizar, cambiar estado) */
btnOpcion.forEach(btn=>{
    btn.addEventListener("click", cargarOpcionFormulario );
});

function cargarOpcionFormulario(){
    opcion      = this.getAttribute("data-opcion");
    idRegistro  = this.getAttribute("data-id");
    urlAjax     = this.getAttribute("data-url");

    console.log('Cargando Formulario...');
    
    let inputOpcion = document.querySelectorAll("input[name='opcion']");

    let encabezados = new Headers(); 
    let data        = new FormData();
    data.append('opcion',opcion);
    data.append('id',idRegistro);

    let config = 
    {
        method: 'POST',
        mode: 'cors', //parametro para pasar el modo.
        headers: encabezados,
        cache: 'no-cache', // Como se comportara la cache.
        body: data
    }
    
    switch (opcion) {
        case 'registrar':

            inputOpcion.forEach(op => { op.value = 'agregar'; });
            
            break;
        case 'editar':
            
            fetch(urlAjax,config)
            .then(respuesta => respuesta.json())//Respuesta en formato json para mostrar bien las 
            .then(datos =>{ 
                //console.log(datos);
                inputOpcion.forEach(op => { op.value = 'actualizar'; });
                
                return cargarDatosFormulario(datos);
                
            }).catch(error => console.error('Error:', error));

            break;
        case 'cambiarEstado':
            Swal.fire
            ({
                title: '¿Estás seguro?',
                text: 'Se cambiara el estado del usuario',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => 
            {
                if (result.value){
                    fetch(urlAjax,config)
                    .then(respuesta => respuesta.json())//Respuesta en formato json para mostrar bien las 
                    .then(datos =>{ 
                        
                        //console.log(datos);
                        return alertas_ajax(datos);
                    });
                
                }
            });
            
            break;
        case 'cambiarPwd':
            break;
        default:
            break;
    }
}

function cargarDatosFormulario(datos = Array) {
    switch (datos['vista']) {
        case 'usuario':
            document.querySelector(".formularios_ajax").reset();

            $('#modalActualizarUsuario').modal('show');
            $('#modalActualizarUsuario input[name="opcion"]').val('actualizar');
            $('#modalActualizarUsuario input[name="id"]').val(datos['id_usuario']);
            $('#modalActualizarUsuario input[name="usuario_nombre_reg"]').val(datos['nombre']);
            $('#modalActualizarUsuario input[name="usuario_apellido_reg"]').val(datos['apellido']);
            $('#modalActualizarUsuario input[name="usuario_cedula_reg"]').val(datos['cedula']);
            $('#modalActualizarUsuario input[name="usuario_usuario_reg"]').val(datos['nick_usuario']);
            $('#modalActualizarUsuario select[name="usuario_tipo_reg"]').val(datos['id_usuario_tipo_fk']);
            $('#modalActualizarUsuario input[name="usuario_clave_reg"]').val(datos['clave_usuario']);
            $('#modalActualizarUsuario input[name="usuario_repetir_reg"]').val(datos['clave_usuario']);
            if(datos['estado']==='A'){
                $('#modalActualizarUsuario input[name="usuario_estado_reg"]').attr('checked',true);
            }else{
                $('#modalActualizarUsuario input[name="usuario_estado_reg"]').attr('checked', false);
            }

            break;
        case 'producto':
            break;
        default:
            break;
    }
}