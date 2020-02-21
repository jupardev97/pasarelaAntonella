<?php

class Migration {

    private $db;
    private $sentFile;
    private $validation;
    private $route;
    private $migrationTables;
    
    public function __construct($conection, $globalFiles) {

        
        $this->db = $conection;
        $this->sentFile = $globalFiles['archivo'];
        $this->route = $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/'.$this->sentFile['name'];
        $this->migrationTables = [
            'primaryTables' => [],
            'foraneyTables' =>[]
        ];
        
        unset($conection, $globalFiles);
    }

    public function validateFileType() {

        $valid_file = [
            'text/plain'
        ];

        if (in_array($this->sentFile['type'], $valid_file)) {
            return ['status' => true, 'type' => 'txt'];
        } else {
            return ['status' => false];
        }
    }

    public function moveFile() {
        if (move_uploaded_file($this->sentFile['tmp_name'], $this->route)) {
            return ['status' => true, 'msg' => 'Archivo Movido al Servidor'];
        } else {
            return ['status' => false, 'msg' => 'Error al Abrir Mover El Archivo'];
        }
    }

    public function openFile() {
        if (( $open = fopen($this->route, "r+"))) {
            return ['status' => true, 'msg' => 'Archivo Aperturado', 'file' => $open];
        } else {
            return ['status' => false, 'msg' => 'Error Al Abrir el Archivo'];
        }
    }

    public function defragData() {
        
        $control = $this->validateFileType();
        if ($control['status']) {
            
            $control = $this->moveFile();

            if ($control['status']) {
                $control = $this->openFile();
                
                if ($control['status']) {
                    
                    $opening = $control['file'];
                    unset($control);
                    $currentTable = -1;
                    $validRecords = [];
                    $invalidRecords = [];
                    $this->migrationTables['foraneyTables'] = [];
                    $this->migrationTables['primaryTables'] = [];
                    
                    
                    while (!feof($opening)) {

                        $line = fgets($opening);
                        $values = explode('/<->/', $line);

                        if (count($values) == 1) {
                            //Cabecera de los Registros..
                            $table = $values[0];
                            
                            $this->validation = $this->tableFields($table);

                            if ($this->validation['status']) {

                                $this->validation = $this->validation['fields'];

                                $nameColums = [];
                                
                                foreach ($this->validation as $i => $name) {
                                    array_push($nameColums, $name['name']);
                                }

                                array_push($validRecords, ['table' => $table, 'counter' => 0, 'records' => [], 'fields' => $nameColums]);
                                array_push($invalidRecords, ['table' => $table, 'counter' => 0, 'records' => [], 'fields' => $nameColums]);
                                
                                $foraneyFields = [];
                                foreach( $this->validation as $type ){
                                    if( $type['key'] == 'FORANEY' ){
                                        array_push( $foraneyFields, $type[ 'name' ] );
                                    }
                                }
                                
                                
                                if( count( $foraneyFields ) ){
                                    
                                    $foraneyFields = $this->dependentTables( $foraneyFields );
                                    
                                    array_push( $this->migrationTables['foraneyTables'], ['table' => $table, 'fields' => $nameColums, 'foraneyFields' => $foraneyFields ]);
                                    unset( $foraneyFields );
                                    //Creamos los Archivos Fragmentados
                                    $this->validFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/valid/'.trim($table).'.txt' , "a+");
                                    $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/invalid/'.trim($table).'.txt' , "a+");
                                    
                                    fwrite( $this->validFile, $table );
                                    fwrite( $this->invalidFile, $table );
                                    
                                }else{
                                    
                                    array_push( $this->migrationTables['primaryTables'], ['table' => $table, 'fields' => $nameColums ]);

                                    //Creamos los Archivos Fragmentados
                                    $this->validFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/valid/'.trim($table).'.txt' , "a+");
                                    $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/invalid/'.trim($table).'.txt' , "a+");
                                    
                                    fwrite( $this->validFile, $table );
                                    fwrite( $this->invalidFile, $table);
                                    
                                }
                                
                                unset($nameColums);
                            } else {

                                $error[$currentTable]['error'] = TRUE;
                                $error[$currentTable]['msg'] = 'No se Pudo Describir la Tabla: ' . $table;
                            }
                            
                            ++$currentTable;
                        } else {
                            
                            //Registros..
                            if (isset($error[$currentTable - 1])) {
                                if ($error[$currentTable - 1]['error']) {
                                    echo 'Error: ' . $error[$currentTable - 1]['msg'] . ' <br> ';
                                    $error[$currentTable - 1]['error'] = FALSE;
                                }
                            } else {
                                //No Existen Errores de Descripcion..
                                if (count( $values ) > count($this->validation)) {
                                    $error[$currentTable]['error'] = TRUE;
                                    $error[$currentTable]['msg'] = 'Existen mas Campos en el Archivo que en la Tabla ' . $table;
                                    ++$currentTable;
                                } else {
                                    $counters = $this->validateLine( $line, $table, $validRecords[$currentTable]['records']);

                                    if ($counters['invalidData'] > 0) {
                                        //Datos Incorrectos..
                                        //++$invalidRecords[$currentTable]['counter'];
                                        //array_push($invalidRecords[$currentTable]['records'], $values);
                                        fwrite( $this->invalidFile, $line );                                        
                                    } else {
                                        //Datos Correctos..
                                        //++$validRecords[$currentTable]['counter'];
                                        //array_push($validRecords[$currentTable]['records'], $values);
                                        fwrite( $this->validFile, $line );
                                    }
                                }
                            }
                        }
                    }//End While();
                    
                    fclose($opening);
                    fclose($this->validFile);
                    fclose($this->invalidFile);
                    
                    unlink( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/' . $this->sentFile['name'] );
                    
                    
                } else {
                    return $control;
                }
            } else {
                return $control;
            }
        } else {
            unset($control);
            return ['status' => false, 'msg' => 'El Tipo de Archivo no Es Valido para la MigraciÃ³n'];
        }
    }

    public function validateLine($line, $table, $validRecords) {
        $counters = [
            'validData' => 0,
            'invalidData' => 0
        ];

        $values = explode('/<->/', $line);

        foreach ($values as $i => $word) {
            foreach ($this->validation as $j => $field) {
                if ($i == $j) {
                    $validations = $this->validateWord( trim( $word ) , $this->validation[$j], $table, $validRecords);
                    if ($validations['status']) {
                        $word = $validations['word'];
                        ++$counters['validData'];
                    } else {
                        //La Palabra no Es Valida
                        ++$counters['invalidData'];
                    }
                }
            }
        }

        return $counters;
    }

    public function validateWord($word, $validation, $table, $validRecords) {


//        echo '<br>'.$validation['name'];
//        echo '<br>'.$validation['type'];
//        echo '<br>'.$validation['length'];
//        echo '<br>'.$validation['null'];
//        echo '<br>'.$validation['key'];
//        echo '<br>'.$validation['default'];
        //var_dump( $validation );


        switch ($validation['type']) {
            case ( 'varchar' || 'char' ):

                if (array_key_exists('length', $validation)) {
                    if (strlen( $word ) > $validation['length']) {
                        //return ['status' => FALSE, 'msg' => 'El Campo Tiene una Longitud Mayor a la Permitida.'];
                    }
                }

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if ($validation['key'] == 'PRIMARY') {
                        //Clave Primaria
                        if (validateVarchar($word)) {
                            //Cumple Con el Formato
                            if (!$this->uniqueField($word, $table, $validation['name'])) {
                                return ['status' => FALSE, 'msg' => 'Primary Key "' . $word . '" Repetida.'];
                            }
                        } else {
                            return ['status' => FALSE, 'msg' => 'El Campo No Cumple Con El Formato Valido.'];
                        }
                }

                return ['status' => TRUE, 'word' => $word];
                break;
            case ( 'int' || 'integer' ):

                if ((int) $word < 0) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Valores Negativos.'];
                }

                if (array_key_exists('length', $validation)) {
                    if (strlen($word) > $validation['length']) {
                        return ['status' => FALSE, 'msg' => 'El Campo Tiene una Longitud Mayor a la Permitida.'];
                    }
                }

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if (!validateInt($word)) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Cumple Con El formato Valido.'];
                }

                return ['status' => TRUE, 'word' => (int) $word];

                break;
            case ('decimal' || 'float' || 'double'):

                if (array_key_exists('length', $validation)) {

                    $decimals = explode(',', $word);

                    if (count($decimals) > 1) {
                        return ['status' => FALSE, 'msg' => 'El Campo Tiene Valores Decimales Separados por Comas.'];
                    } else {
                        $decimals = explode('.', $word);

                        if (count($decimals) > 1) {

                            if (array_key_exists('decimal', $validation)) {

                                if (strlen($decimal[0]) > ( $validation['length'] - $validation['decimal'] )) {
                                    return ['status' => FALSE, 'msg' => 'El Campo Tiene Un Valor Mayor a la Permitida.'];
                                }
                            } else {
                                if (strlen($decimal[0]) > $validation['length']) {
                                    return ['status' => FALSE, 'msg' => 'El Campo Tiene Un Valor Mayor a la Permitida.'];
                                }
                            }
                        } else {
                            if (strlen($decimals[0]) > $validation['length']) {
                                return ['status' => FALSE, 'msg' => 'El Campo Tiene Una Longitud Mayor.'];
                            }
                        }
                    }
                }

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if (!validateDate($word)) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Cumple Con El formato Valido.'];
                }

                return ['status' => TRUE, 'word' => $word];
                break;
            case 'date':

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if (!validateDate($word)) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Cumple Con El formato Valido.'];
                }

                return ['status' => TRUE, 'word' => $word];
                break;
            case 'time':

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if (!validateTime($word)) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Cumple Con El formato Valido.'];
                }

                return ['status' => TRUE, 'word' => $word];

                break;
            case 'enum':

                $counterOptions = count($validation['values']);

                foreach ($validation['values'] as $option) {
                    if ($option == $word) {
                        --$counterOptions;
                    }
                }

                if (( strtolower($word) == 'null' ) && (!$validation['null'] )) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite Campo Nulo.'];
                }

                if ((strlen($word) == 0 ) && ( $validation['default'] != 'VOID')) {
                    $word = $validation['default'];
                }

                if ($counterOptions == count($validation['values'])) {
                    return ['status' => FALSE, 'msg' => 'El Campo No Admite El Valor Asignado.'];
                }

                return ['status' => TRUE, 'word' => $word];
                break;
            default:
                return ['status' => TRUE, 'msg' => 'No Se Encuentra Registrada Una Validación para Esa '];
        }
    }

    public function uniqueField($word, $table, $field) {

        $sql = 'SELECT ' . $field . ' FROM ' . $table . ' WHERE ' . $field . ' = "' . $word . '"';
        
        $this->db->query($sql);
        
        if(  $this->db->execute() ){
            
            if ( $this->db->rowCount() ){
                return FALSE;
            }else{
                return TRUE;
            }
            
        } else {
            return FALSE;
        }
        
        
        if ($data = $this->db->query($sql)) {
            if ($data->fetch_assoc()) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function tableFields($table) {
        
        $sql = 'DESCRIBE ' . $table . ';';
        //echo $table . '<hr><br><br>';
        $this->db->query($sql);
        
        if(  $this->db->execute() ){
            
            if ( $this->db->rowCount() ){
                $structure = [];                
                //var_dump( $this->db->requestAll()[0]->Field );
                
                foreach( $this->db->requestAll() as $j => $object  ){
                    $structure[$j]['name'] = $object->Field;
                    $type = explode( '(', $object->Type );
                    
                    if (count($type) > 1) {
                    $structure[$j]['type'] = $type[0];

                    if (($type[0] == 'float') || ( $type[0] == 'decimal' ) || ( $type[0] == 'double')) {
                        $decimal = explode(',', $type[1]);
                        if (count($decimal) > 1) {

                            $structure[$j]['length'] = (int) $decimal[0];
                            $structure[$j]['decimal'] = (int) $decimal[1];
                        } else {

                            $structure[$j]['length'] = (int) $decimal[0];
                        }
                    } else if (($type[0] == 'enum')) {

                        $elements = explode(',', $type[1]);

                        foreach ($elements as $i => $value) {
                            $structure[$j]['values'][$i] = $value;
                        }

                        unset($elements);
                    } else {
                        $type = explode(')', $type[1]);
                        $structure[$j]['length'] = (int) $type[0];
                    }
                } else {
                    $structure[$j]['type'] = $type[0];
                }
                unset($type);

                $structure[$j]['null'] = ( $object->Null == 'NO' ) ? ( FALSE ) : ( TRUE );

                if ( $object->Key === 'PRI') {
                    $structure[$j]['key'] = 'PRIMARY';
                } else if ( $object->Key === 'MUL') {
                    $structure[$j]['key'] = 'FORANEY';
                } else {
                    $structure[$j]['key'] = 'NORMAL';
                }
                    
                $structure[$j]['default'] = ( $object->Default != '' ) ? ( $object->Default ) : ( 'VOID' );   
                
                }
                
                return ['status' => true, 'msg' => 'Campos Analizados.', 'fields' => $structure ];
            }else{
                return ['status' => false, 'msg' => 'La Tabla ' . $table . ' No Existe.'];
            }
            
        } else {
            return ['status' => false, 'msg' => 'Error en la Consulta para la Tabla ' . $table . '.'];
        }
    }

    public function dependentTables( $foraneyFields ){
        
        $foraneyData = [];
        
        foreach( $foraneyFields as $key => $field ){
            $sql = 'SELECT DISTINCT REFERENCED_TABLE_NAME AS referenceTable, REFERENCED_COLUMN_NAME AS referenceColumn FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_COLUMN_NAME = "'.$field.'";';
            
            $this->db->query( $sql );
            
            if( $this->db->execute() ){
                
                foreach( $this->db->requestAll() as $j => $object  ){
                    
                 array_push( $foraneyData, [ 'field' => $field, 'dependentTable' => $object->referenceTable, 'referendeField' => $object->referenceColumn ] );
                
                }       
            }else{
                echo 'Error en la Busqueda de Tablas Dependientes';
            }
        }
        
        return $foraneyData;
    }
    
    public function organizeForeignTables(){
        $exchange = [];
        
        foreach( $this->migrationTables['foraneyTables'] as $i => $internalTable ){
            //var_dump( $internalTable );
            $dependentTable = [];
            //$order[$i] = $internalTable;
            
            foreach( $internalTable['foraneyFields'] as $j => $foraneign ){
                $dependentTable[$j] = $foraneign['dependentTable'];
            }
            
            
            for( $k = $i; $k < count( $this->migrationTables['foraneyTables']); $k++ ){
                foreach( $dependentTable as $l => $foraneign ){
                    
                    if( $foraneign === $this->migrationTables['foraneyTables'][$k]['table'] ) {
                        $exchange = $this->migrationTables['foraneyTables'][$k];
                        $this->migrationTables['foraneyTables'][$i] = $this->migrationTables['foraneyTables'][$k];
                        $this->migrationTables['foraneyTables'][$i] = $exchange;
                    }
                }
            }
        }
        
    }
    
    public function migratePrimaryFiles(){
        
        if( count( $this->migrationTables['primaryTables'] ) ){
            
        foreach( $this->migrationTables['primaryTables'] as $key => $table ){
            $this->validFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/valid/'.trim($table['table']).'.txt' , "r+");
            $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/invalid/'.trim($table['table']).'.txt' , "a+");
            
            while (!feof($this->validFile)) {
                $line = fgets($this->validFile);
                $values = explode('/<->/', $line);
        
                if (count($values) > 1) {
                    $control = $this->insertData($table['table'], $table['fields'], $values);
                    
                }
            }
            $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/valid/'.trim($table['table']).'.txt' , "r+");
            
            $invalidCounter = 0;
            while (!feof($this->invalidFile)) {
                $line = fgets($this->invalidFile);
                $values = explode('/<->/', $line);
        
                if (count($values) > 1) {
                    ++$invalidCounter;
                    }
                }
        
            fclose( $this->validFile );
            fclose( $this->invalidFile );
            
            unlink( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/valid/'.trim($table['table']).'.txt' );
            unlink( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/primary/invalid/'.trim($table['table']).'.txt' );
            }
        }
        
        
    }
    
    public function migrateForaneyFiles(){
        
        if( count( $this->migrationTables['foraneyTables'] ) ){
            
        foreach( $this->migrationTables['foraneyTables'] as $key => $table ){

            $this->validFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/valid/'.trim($table['table']).'.txt' , "r+");
            $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/invalid/'.trim($table['table']).'.txt' , "a+");
            
            while (!feof($this->validFile)) {
                $line = fgets($this->validFile);
                $values = explode('/<->/', $line);
                
                if (count($values) > 1) {
                    $control = $this->insertData($table['table'], $table['fields'], $values);
                }
            }
            fclose( $this->invalidFile );
            $this->invalidFile = fopen( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/invalid/'.trim($table['table']).'.txt' , "r+");
            
            $invalidCounter = 0;

            while (!feof($this->invalidFile)) {
                $line = fgets($this->invalidFile);
                $values = explode('/<->/', $line);
                
                if (count($values) > 1) {
                    ++$invalidCounter;
                }
            }
            fclose( $this->validFile );
            fclose( $this->invalidFile );
            unlink( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/valid/'.trim($table['table']).'.txt' );
            unlink( $_SERVER['DOCUMENT_ROOT'].'/pasarelaAntonella/app/files/foraney/invalid/'.trim($table['table']).'.txt' );
            }
        
        }
        
    }
    
    public function insertData($table, $fields, $values){
        
        foreach( $values as $key => $formatValue ){
            $formatValue = htmlentities(addslashes( $formatValue ));
        }
        
        $insertFields = implode( ', ', $fields );
        $insertValues = implode( '" , "', $values);
        $sql = 'INSERT INTO '. $table .' ('.$insertFields.') VALUES ("'.$insertValues.'");';
        
        
        $this->db->query( $sql );
        
        if( $this->db->execute() ){
            return [ 'status' => TRUE ];
        }else{
            fwrite( $this->invalidFile, implode( '/<->/', $values ) );
            return [ 'status' => FALSE ];
        }
        
    }
    public function generateHeaderTable( $fields ){
        
        $headerTable = '<tr class="bg-gradient-red">';
        
        foreach( $fields as $values ){
            $headerTable .= '<th>';
                $headerTable .= $values;
            $headerTable .= '</th>';
        }
        $headerTable .= '</tr>';
        
        return $headerTable;
    }
    
}
