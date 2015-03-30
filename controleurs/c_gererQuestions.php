<?php

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

$lesQuestion = $pdo->afficherQuestion();
for ($i=0; $i<count($lesQuestion); $i++){
    $lesQuestion[$i]['lesReponse'] = $pdo -> afficherReponse($lesQuestion[$i]['idQuestion']);
}
//echo '<pre>';
//print_r($lesQuestion);
//echo '</pre>';

include("vues/v_gestionQuestion.php");