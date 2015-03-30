<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST) || !empty($_POST))
{
    if(isset($_POST["modif"]))
    {
        if(!empty($_POST['idMot']) && !empty($_POST['contenuMot']) && !empty($_POST['nbPointsMot']) && !empty($_POST['dureeMot'])){
            $pdo->modifierMots($_POST['idMot'],$_POST['contenuMot'],$_POST['nbPointsMot'],$_POST['dureeMot']);   
        }
        else
        {
            ajouterErreur("Veuillez renseigner tout les champs");
            include ('vues\v_erreurs.php');
        }
    }
    if(isset($_POST["ajouter"]))
    {
        if(!empty($_POST['mot']) && !empty($_POST['point']) && !empty($_POST['duree'])){
            $pdo->ajouterMots($_POST['mot'],$_POST['point'],$_SESSION['idTheme'],$_POST['duree']);   
        }else{
            ajouterErreur('Veuillez mettre un nom, un nombre de point et une durée non nulle.');
            include ('vues\v_erreurs.php');
        }
    }
}
if(isset($_GET["sup"]))
{
    $pdo->supprimerMots($_GET['sup']);
    header('location:index.php?uc=gestionMots');
}

$lesThemes = $pdo->afficherThemes($_SESSION['idTheme']);

include("vues/v_gestionThemes.php");