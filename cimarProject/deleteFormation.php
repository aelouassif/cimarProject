<?php
    require_once "bootstrap.php";
    include "src/Formation.php";
    $formation = new Formation();
    $formation = $entityManager->getRepository('Formation')->findOneBy(array('id' => $_POST["id"]));
    $entityManager->remove($formation);
    $entityManager->flush();

 ?>
