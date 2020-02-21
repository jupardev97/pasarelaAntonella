<?php

function redireccionar($page) {
    header('location:' . ROUTE_URL . $page);
}

function activeSession() {
    if (isset($_SESSION['ced_tra']) && isset($_SESSION['nom_usu']) && isset($_SESSION['tip_car']) ) {
        return true;
    } else {
        return false;
    }
}

function checkSession($address = '') {
    if (!( activeSession() )) {
        redireccionar($address);
    } else {
        return true;
    }
}
function validateEmail($email) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        return true;
    }
    return false;
}

function validateDate($date) {
    if (preg_match("/^([0-9]{4}\-([0-1]{1}[0-9]{1})\-([0-1]{1}[0-9]{1}))$/", $date)) {
        return true;
    }
    return false;
}

function validateInt($int) {
    if (preg_match("/^([0-9]+)$/", $int)) {
        return true;
    }
    return false;
}

function validateVarchar( $string ){
    if (preg_match("/^([a-zA-ZáéíóúñÁÉÍÓÚ\_\-0-9]+)$/", $string)) {
        return true;
    }
    return false;
}

function validateTime( $time ){
    
    if (preg_match("/^([0-2]{1}[0-9]{1}\:[0-5]{1}[0-9]{1}\:[0-5]{1}[0-9]{1})$/", $time )) {
        return true;
    }
    return false;
    
}
