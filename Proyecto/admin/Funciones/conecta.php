<?php
//conecta.php
define ("HOST",'localhost');
define("USER_BD", 'root');
define("PASS_BD", '');
define("BD",'cliente_d04');

function conecta () {
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
    return $con;

}
?>