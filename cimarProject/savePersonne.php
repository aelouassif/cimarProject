<?php
    require_once "bootstrap.php";
    include 'src/Personne.php';
    $personne = new Personne();

    if(isset($_GET["matricule"]))
        $personne-> setMatrecule($_GET["matricule"]);
    if(isset($_GET["nomPrenom"]))
        $personne-> setNomPrenom($_GET["nomPrenom"]);
    if(isset($_GET["dateEmbache"]))
        $personne-> setDateEmbache($_GET["dateEmbache"]);
    if(isset($_GET["dateNaissance"]))
        $personne-> setDateNaissance($_GET["dateNaissance"]);
    if(isset($_GET["CNSS"]))
        $personne-> setCNSS($_GET["CNSS"]);
    if(isset($_GET["poste"]))
        $personne-> setPoste($_GET["poste"]);
    if(isset($_GET["departement"]) and $_GET["departement"]!="Select...")
        $personne-> setDepartement($_GET["departement"]);

    $entityManager->persist($personne);
    $entityManager->flush();
    header("location: gestionPersonne.php");
 ?>
