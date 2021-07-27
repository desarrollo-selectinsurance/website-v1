<?php
require_once 'app/views/assets/header.php';
require_once 'app/models/autoload.php';

class ControllerManagment extends Pather
{
    //(==============================================================================================)
    //(==============================================================================================)
    //Controlador de login del Managment
    public function __construct()
    {
        $this->table = "UsuarioManagment";
    }
    public function ControllerManagmentLogin()
    {
        require_once 'app/views/assets/NavPrincipal.php';
        require_once 'app/views/pages/managment/login.php';
    }

    public function ControllerManagmentConsultaLogin($user, $pass)
    {
        $consultar = new ConsultaLogin($user, $pass, $this->table);
        if ($consultar->Consulta()) {
            $_SESSION['managment'] = 'admin';
        } else {
            require_once 'app/views/assets/NavAgente.php';
            require_once 'app/views/pages/managment/login.php';
        }
    }


    //(==============================================================================================)
    //(==============================================================================================)
    //Controlador para carga de videos de Vida
    public function ControllerManagmentCargaVideosVida()
    {
        require_once 'app/views/assets/NavAgente.php';
        require_once 'app/views/pages/managment/modulos/CargaVideosVida.php';
    }

    public function ControllerCargandoVideos($nombre, $RutaTemporal, $NombreArchivo, $TamañoArchivo, $TipoArchivo, $table, $ruta)
    {
        $subirVideos = new SubidaArchivos($nombre, $RutaTemporal, $NombreArchivo, $TamañoArchivo, $TipoArchivo, $table);
        $mensaje = $subirVideos->SubidaValidando($ruta);
    }

    public function ControllerPrincipalManagment()
    {
        require_once 'app/views/assets/NavAgente.php';
        require_once 'app/views/pages/managment/InicioManagment.php';
    }



    //(==============================================================================================)
    //(==============================================================================================)
    //Controlador para carga de videos de Salud
    public function ControllerManagmentCargaVideosSalud()
    {
        require_once 'app/views/assets/NavAgente.php';
        require_once 'app/views/pages/managment/modulos/CargaVideosSalud.php';
    }



    //(==============================================================================================)
    //(==============================================================================================)
    //Controlador para editar o eliminar Videos de Salud
    public function ControllerManagmentEditarEliminarVideoSalud()
    {
        require_once 'app/views/assets/NavAgente.php';
        $Select = "SELECT * FROM videosdesalud";
        $Query = new crud();
        require_once 'app/views/pages/managment/modulos/EliminarEditarVideosSalud.php';
    }

    //Controlador para hacer update a videos de Salud
    public function ControllerManagmentProcesoEditarVideoSalud($id, $nombre)
    {
        foreach ($id as $IdVideo) {
            $Update = "UPDATE videosdesalud SET Nombre = '$nombre' WHERE idVideo = '$IdVideo'";
            $Query = new crud();
            $Query->Update($Update);
        }
    }

    //Controlador para hacer Delete a Videos de Salud
    public function ControllerManagmentProcesoEliminarVideoSalud($id)
    {

        foreach ($id as $IdVideo) {
            $Select = "SELECT URL FROM videosdesalud WHERE idVideo = '$IdVideo'";
            $Delete = "DELETE FROM videosdesalud WHERE idVideo = '$IdVideo'";
            $Query = new crud();
            $resultado = $Query->Read($Select);
            $Query->Delete($Delete);

            $row = mysqli_fetch_assoc($resultado);
            $Eliminar = new EliminarArchivos($row['URL']);
            $Eliminar->Eliminar();
        }
    }

    //(==============================================================================================)
    //(==============================================================================================)
    //Controlador para editar o eliminar Videos de Vida
    public function ControllerManagmentEditarEliminarVideoVida()
    {
        require_once 'app/views/assets/NavAgente.php';




        //Consulta de las 3 tablas dinamicas
        $SelectAnico = "SELECT * FROM videosanico";
        $SelectAmeritas = "SELECT * FROM videosameritas";
        $SelectNationalLife = "SELECT * FROM videosnationallife";


        //Ejecutando los 3 ciclos
        $query = new crud();
        $Anico = $query->Read($SelectAnico);
        $Ameritas = $query->Read($SelectAmeritas);
        $NationalLife = $query->Read($SelectNationalLife);
        require_once 'app/views/pages/managment/modulos/EliminarEditarVideosVida.php';
    }


    //Controlador para hacer update a videos de Vida
    public function ControllerManagmentProcesoEditarVideoVida($Array, $nombre, $table)
    {
        foreach ($Array as $id) {
            $Update = "UPDATE $table SET Nombre = '$nombre' WHERE idVideo = '$id'";
            $query = new crud();
            $query->Update($Update);
        }
    }


    //Controlador para hacer Delete a Videos de Vida
    public function ControllerManagmentProcesoEliminarVideoVida($Array, $table)
    {
        foreach ($Array as $id) {
            $Select  = "SELECT URL FROM $table WHERE idVideo = '$id'";
            $Delete = "DELETE FROM $table WHERE idVideo = '$id'";

            $query = new crud();
            $Consulta = $query->Read($Select);
            $rows = mysqli_fetch_assoc($Consulta);
            $Eliminar = new EliminarArchivos($rows['URL']);
            $Eliminar->Eliminar();
            $query->Delete($Delete);
        }
    }

    //(==============================================================================================)
    //(==============================================================================================)
    //Formulario para Agregar Eventos a la Base de datos
    public function ControllerManagmentFormularioEventos()
    {
        require_once 'app/views/assets/NavAgente.php';

        require_once 'app/views/pages/managment/modulos/Eventos.php';

        if (isset($_POST['btnAñadirEventos'])) {
            $Name =  $_POST['name'];
            $Date = date_format(date_create($_POST['date']), 'm-d-y'); //Convirtiendo la fecha en un string admintido en el calendario
            $Description = $_POST['description'];
            $Type = $_POST['type'];
            $EveryYear = boolval($_POST['everyYear']); //Convirtiendo String en booleano
            $BadGe = $_POST['badge'];
            $Color = $_POST['color'];
            $query = "INSERT INTO Calendario(
                name,
                date, 
                description, 
                type, 
                everyYear, 
                badge, 
                color
                )
                VALUES(
                    '$Name',
                    '$Date',
                    '$Description',
                    '$Type',
                    '$EveryYear',
                    '$BadGe',
                    '$Color'
                );";
            $Insert = new Eventos();
            $mensaje = $Insert->IngresarEvento($query);
        }
    }


    //Controller para Crear Paginas
    public function ControllerManagmentCrearPagina()
    {
        $crud = new crud();

        //Consultando en la base de Datos
        $ConsultaCrearPagina = $crud->Read("SELECT * FROM crearpagina");
        $ConsultaImagenAgente = $crud->Read("SELECT * FROM imagenagente");


        require_once 'app/views/assets/NavAgente.php';
        require_once 'app/views/pages/managment/modulos/CrearPaginaAgente.php';
    }

    //Controller para Eliminar o Editar Paginas
    public function ControllerManagerEditarEliminarPagina($Array, $nombre, $TipoBoton)
    {
        foreach ($Array as $id) {
            if ($TipoBoton == 'Editar') {
                $crud = new crud();

                
                $crearpagina = $crud->Read("SELECT Titulo FROM crearpagina WHERE id = '$id'");
                $rows = mysqli_fetch_assoc($crearpagina);
                $Archivo = fopen('app/views/pages/AgentesPages/'.$rows['Titulo'].'.php', 'r');
                fclose($Archivo);
                rename('app/views/pages/AgentesPages/'.$rows['Titulo'].'.php','app/views/pages/AgentesPages/'.$nombre.'.php');


                $crud->Update("UPDATE crearpagina SET Titulo = '$nombre' WHERE id = '$id'");
                $crud->Update("UPDATE imagenagente SET NombrePagina = '$nombre' WHERE id = '$id'");
            }

            //$mensaje = $TipoBoton;
            //require_once 'app/views/prueba.php';
        }
    }

    //Controller para Crear Paginas 
    //NombreArchivo, Nombre Agente, Nombre Imagen Temporal, Nombre Imagen
    public function ControllerManagmentProcesoCrearPagina($NombrePagina, $Nombre, $Email, $Telefono, $NombreImgTmp, $NombreImg)
    {
        if (isset($_POST['btnCrearPagina']) && !file_exists('app/views/pages/AgentesPages/' . $NombrePagina . '.php')) {

            //Subiendo Imagen
            $SubiendoImagen = new SubidaArchivos(null, null, null, null, null, null);
            $SubiendoImagen->SubidaImagenes('app/views/assets/img/ImagenesAgentes/', $NombreImgTmp, $NombreImg, $NombrePagina);


            //Creando paginas en el directorio AgentesPages
            $CreadorPaginas = new CreadorPaginas();
            $CreadorPaginas->CrearPagina('app/views/pages/AgentesPages/', $NombrePagina, $Nombre, $Email, $Telefono);
        } else {
            require_once 'app/views/assets/NavAgente.php';
            require_once 'app/views/mensajes/ErrorPaginaExistente.php';
        }
    }

    public function ControllerManagmentErrorPaginaExistente()
    {
    }
}
require_once 'app/views/assets/WhatsappPegajoso/WhatsappPrincipal.php';
require_once 'app/views/assets/footer.php';
