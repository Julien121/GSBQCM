<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$d = $_POST;
if(isset($d) || !empty($d))
{
    if(isset($d["modif"]))
    {
        if(!empty($d['nom'])){
            $pdo->modifierThemesNom($d['id'],$d['nom']);   
        }
        if(!empty($d['duree'])){
            $pdo->modifierThemesDuree($d['id'],$d['duree']);
        }
    }
    if(isset($d["ajouter"]))
    {
        if(!empty($d['nom']) && !empty($d['duree'])){
            $pdo->ajouterThemes($d['nom'],$d['duree']);   
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