<?php
    class Migraciones extends Controller {
        
    private $db;
        
    public function __construct() {
        session_start();
        checkSession('Login');
        $this->db = new Base;
    }

    public function index() {

        //Menu de naveacion
        $this->cargarHeader();
        
        //Intermedios
        if( count( $_FILES ) ){
            $this->view('Migraciones/finalizada');
            $migracion = new Migration( $this->db, $_FILES );
            $migracion->defragData();
            $migracion->migratePrimaryFiles();
            $migracion->migrateForaneyFiles();
        }else{
            $this->view('Migraciones/formulario');
        }
        
        
        
        //Ultimos
        $this->cargarFooter();
    }
        
    public function Respaldo(){
        //Menu de naveacion
        $this->cargarHeader();
        
        //Intermedios
        
         $this->view('Migraciones/respaldo');
        
        
        
        //Ultimos
        $this->cargarFooter();
    }
    public function Restaurar(){
        //Menu de naveacion
        $this->cargarHeader();
        
        //Intermedios
        
         $this->view('Migraciones/restaurar');
        
        
        
        //Ultimos
        $this->cargarFooter();
    }

    public function subir_archivo(){
        
          //Menu de naveacion
        $this->cargarHeader();
        
        //Intermedios
        
        
	
	$user= 'root';
	$password= '';
	$bd= 'pasa_anto';



	$fecha=getdate();
	$nombre='Respaldo__'.$fecha["mday"]."-".$fecha["mon"]."-".$fecha["year"]."__".$fecha["hours"]."-".$fecha["minutes"]."-".$fecha["seconds"].".sql";

	//$nombre= 'Respaldo_'.date('d-m-Y').'.sql';
	$directorio= 'C:\\php\\respaldo';

	$dir= $directorio.'\\'.$nombre;

	

	$comando= "C:\\xampp\\mysql\\bin\\mysqldump.exe --opt --user=$user --password=$password pasa_anto > $dir";
	system($comando, $error);
echo 'exitooooooooooooooooooooooooooooooooooooo';
        
	//header( "location:respaldo.php");


        
        
        
        //Ultimos
        $this->cargarFooter();
    }    
        
    
    public function subir_restaurar(){
        
          $this->cargarHeader();
        
        //Intermedios
        
      $host='localhost';
	$user= 'root';
	$password= '';
	


	
	$archivo=$_POST['archivo'];
	
	$directorio='C:\\php\\respaldo';

	$dir=$directorio.'\\'.$archivo;

	

	$comando= "C:\\xampp\\mysql\\bin\\mysql.exe --user=$user --password=$password pasa_anto < $dir";
	system($comando, $error);

	echo 'se restauro';
        
        
        //Ultimos
        $this->cargarFooter();
    }    
        
    public function cargarHeader(){
        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Migraciones'
        ];
        
        //Menu de naveacion
        $this->view('inicio/header', $config);
        unset($config);
    }
    public function cargarFooter(){
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
    }

        
    }

    