<?php

class Trabajador extends Controller {

    private $trabajador;
    private $cargo;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->trabajador = $this->model('modeloTrabajador');
        $this->cargo = $this->model('modeloCargo');
    }

    public function index() {
        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Trabajador'
        ];
        $this->view('inicio/header', $config);
        $this->view('trabajadores/tablaTrabajadores', $config);
        $cargos = $this->rescatarCargos();
        $this->view('trabajadores/modalTrabajadores' , [ 'cargos' => $cargos ] );
        unset( $cargos, $config );
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('trabajadores/js/main');
    }
    
    public function rescatarCargos(){
        return $this->cargo->selectAll()['data'];
        /*var_dump( $cargos['data'][0]->ide_car );
        var_dump( $cargos['data'][0]->tip_car );
        var_dump( $cargos['data'][0]->hor_tra );
        var_dump( $cargos['data'][0]->pag_hor );
        */
    } 
    
    public function seleccionarTodos() {
        $result = $this->trabajador->selectAll();

        if ($result['reg']) {
            $answer = [
                'status' => 'complete',
                'msg' => $result['reg'] . ' Registros Listados',
                'data' => [
                    'trabajador' => $result['data'],
                    'reg' => $result['reg']]
            ];
            unset($result);
            $this->cargo = $this->model('modeloCargo');
            $result = $this->cargo->selectAll();

            $answer['data']['cargo'] = $result['data'];

            $cargo['admin'] = $result['data'][0]->tip_car;
            $cargo['vendedor'] = $result['data'][1]->tip_car;

            unset($result);

            foreach ($answer['data']['trabajador'] as $object) {
                unset($object->cla_car);
                switch ($object->ide_car) {
                    case 1:
                        $object->ide_car = $cargo['admin'];
                        break;
                    case 2:
                        $object->ide_car = $cargo['vendedor'];
                        break;
                }
            }
            unset($cargo);
            return $answer;
        } else {
            $answer = [
                'status' => 'error',
                'msg' => 'No hay Trabajadores Registrados',
                'reg' => $result['reg']
            ];
            return $answer;
        }
    }

    public function createTrabajador($cedula, $nombres, $direccion, $cargo, $opcionales = []) {
        
        
        
        if (isset($cedula) && isset($nombres) && isset($direccion) && isset($cargo)) {

            $confirmation = [
                'ide_car' => trim($cargo)
            ];

            $this->cargo = $this->model('modeloCargo');
            $result = $this->cargo->findOne($confirmation);
            
            if ($result['reg']) {
                $cargo = $result['data']->ide_car;
                unset($confirmation);
                unset($result);
                $this->cargo = null;

                $confirmation = [
                    'ced_tra' => trim((string) $cedula)
                ];

                $result = $this->trabajador->findOne($confirmation);
                if ($result['reg']) {
                    unset($result);
                    $answer = [
                        'status' => 'error',
                        'msg' => 'Ya se Encuentra Un Trabajador Con esta Cedula'
                    ];
                    return $answer;
                } else {

                    unset($result);

                    $data = [
                        'ced_tra' => trim((string) $cedula),
                        'ide_car' => trim((string) $cargo),
                        'nom_tra' => trim((string) $nombres),
                        'dir_tra' => trim((string) $direccion),
                        'cor_tra' => ( array_key_exists('correo', $opcionales) ) ? ( trim((string) $opcionales['correo']) ) : ( null ),
                        'tel_tra' => ( array_key_exists('telefono', $opcionales) ) ? ( trim((string) $opcionales['telefono']) ) : ( null ),
                        'cla_tra' => ( array_key_exists('clave', $opcionales) ) ? ( $this->hashingPassword(trim((string) $opcionales['clave'])) ) : ( null )
                    ];

                    $result = $this->trabajador->create($data);

                    if ($result['reg']) {

                        $answer = [
                            'status' => 'complete',
                            'msg' => $result['msg']
                        ];
                        unset($result);
                        $this->trabajador = null;
                        return $answer;
                    } else {
                        $answer = [
                            'status' => 'complete',
                            'msg' => $result['msg']
                        ];
                        unset($result);
                        $this->trabajador = null;
                        return $answer;
                    }
                }
            } else {
                $answer = [
                    'status' => 'error',
                    'msg' => 'No se Ha Encontrado El Id del Cargo'
                ];
                return $answer;
            }
        } else {
            redireccionar('Trabajador');
        }
    }

    public function updateTrabajador($cedula, $nombres, $direccion, $cargo, $opcionales = []) {

        if (isset($cedula) && isset($nombres) && isset($direccion) && isset($cargo)) {

            $data = [
                'ced_tra' => trim((string) $cedula),
                'ide_car' => trim((int) $cargo),
                'nom_tra' => trim((string) $nombres),
                'dir_tra' => trim((string) $direccion),
                'cor_tra' => ( array_key_exists('correo', $opcionales) ) ? ( trim((string) $opcionales['correo']) ) : ( null ),
                'tel_tra' => ( array_key_exists('telefono', $opcionales) ) ? ( trim((string) $opcionales['telefono']) ) : ( null ),
                'cla_tra' => ( array_key_exists('clave', $opcionales) ) ? ( $this->hashingPassword(trim((string) $opcionales['clave'])) ) : ( null )
            ];

            $result = $this->trabajador->update($data);
            if ($result['reg']) {
                $answer = [
                    'status' => 'complete',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            } else {
                $answer = [
                    'status' => 'error',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            }
        } else {
            redireccionar('Trabajador');
        }
    }

    public function deleteTrabajador($cedula) {
        if (isset($cedula)) {
            $data = [
                'ced_tra' => trim((string) $cedula)
            ];

            $result = $this->trabajador->delete($data);
            
            if ( $result['reg'] ) {
                $answer = [
                    'status' => 'complete',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            } else {
                $answer = [
                    'status' => 'incomplete',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            }
        } else {
            redireccionar('Trabajador');
        }
    }

    public function hashingPassword($password) {
        return md5($password);
    }

}
