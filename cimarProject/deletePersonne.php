<?php
    require_once "bootstrap.php";
    include "src/Personne.php";
    $personne = new Personne();
    $personne = $entityManager->getRepository('Personne')->findOneBy(array('matrecule' => $_POST["matrecule"]));
    $entityManager->remove($personne);
    $entityManager->flush();

 ?>
