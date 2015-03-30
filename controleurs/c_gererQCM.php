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
        if(!empty($_POST['nom'])){
            $pdo->modifierThemesNom($_POST['id'],$_POST['nom']);   
        }
        if(!empty($_POST['duree'])){
            $pdo->modifierThemesDuree($_POST['id'],$_POST['duree']);
        }
    }
    if(isset($_POST["ajouter"]))
    {
        if(!empty($_POST['nom']) && !empty($_POST['duree'])){
            $pdo->ajouterThemes($_POST['nom'],$_POST['duree']);   
        }else{
            ajouterErreur('Veuillez mettre un nom et une durée non nulle.');
            include ('vues\v_erreurs.php');
        }
    }
}
if(isset($_GET["sup"]))
{
    $pdo->supprimerThemes($_GET['sup']);
    header('location:index.php');
}
$lesQCM = $pdo->afficherQCM();
include("vues/v_gestionQCM.php");
