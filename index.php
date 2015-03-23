<?php

require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
 
include("vues/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
if(!isset($_GET['uc'])){
     $_GET['uc'] = 'index';
}
$uc = $_GET['uc'];
switch($uc){
	case 'index':
	{
            include("vues/v_menu.php");
            include("controleurs/c_gererThemes.php");break;
	}
        case 'gestionQCM':
        {
            include("vues/v_menu.php");
            include("controleurs/c_gererThemes.php");
            break;
        }
        case 'gestionQuestion':
        {
            include("vues/v_menu.php");
            //include("controleurs/c_gererQuestion.php");
            break;
        }
        
}
include("vues/v_pied.php") ;
?>

