 <?php
     require_once "bootstrap.php";
     include 'src/Formation.php';
     include 'src/Personne.php';
     include 'src/Evaluation.php';


     $formation = new Formation();
     $personne = new Personne();

     if(isset($_GET["theme"]))
         $formation-> setTheme($_GET["theme"]);
     if(isset($_GET["population"]))
         $formation-> setPopulation($_GET["population"]);
     if(isset($_GET["objectif"]))
         $formation-> setObjectif($_GET["objectif"]);
     if(isset($_GET["dateDebut"]))
         $formation-> setDateDebut($_GET["dateDebut"]);
     if(isset($_GET["dateFin"]))
         $formation-> setDateFin($_GET["dateFin"]);
     if(isset($_GET["formateur"]))
         $formation-> setFormateur($_GET["formateur"]);
     if(isset($_GET["organisme"]))
         $formation-> setOrganisme($_GET["organisme"]);
     $entityManager->persist($formation);
     $entityManager->flush();

     if(isset($_GET["personnes"])){
        //  $formation-> setDateDebut($_GET["dateDebut"]);
        foreach ($_GET["personnes"] as $id) {
            $evaluation = new Evaluation();
            echo $id." <br>";
            $personne = $entityManager->getRepository('Personne')->findOneBy(array('id' => $id));
            echo $personne->getId()." <br>";

            $formation->addEvaluation($evaluation);
            $personne->addEvaluation($evaluation);

            $entityManager->persist($evaluation);
            $entityManager->flush();
        }
     }




     header("location: gestionFormation.php");
 ?>
