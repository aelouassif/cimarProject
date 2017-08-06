<?php
    require_once "bootstrap.php";
    include 'src/Formation.php';
    include 'src/Personne.php';
    include 'src/Evaluation.php';

    $idPersonne = $_POST["idPersonne"];
    $idForamtion = $_POST["idForamtion"];
    $evaluation = $entityManager->getRepository('Evaluation')->findOneBy(array('personne' => $idPersonne,'formation' => $idForamtion));

    $tab = $evaluation->getNoteIndividuelle();
    for ($i=1; $i <=13 ; $i++) {
        if(isset($_POST["q".$i]))
            $tab[$i-1] = $_POST["q".$i];
    }
    $evaluation->setNoteIndividuelle($tab);
    $entityManager->persist($evaluation);
    $entityManager->flush();
