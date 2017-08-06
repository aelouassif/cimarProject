<?php
 ?>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; font-size: 15pt; border: solid 1px black; background-color:green; margin-bottom:5px;">
            <tr>
                <td style="text-align: center;    width: 100%; color:#ffffff;">intitule de la formation</td>
            </tr>
            <br><br><br>
        </table>


        <table cellspacing="0" style="padding: 0px; width: 100%; border: solid 1px #000000; font-size: 10pt; ">
            <tr >
                <td style="width: 35%; boarder: solid 1px #000000; height: 20px; ">Lieu de la Formation                </td>
                <td style="width: 65%; border: solid 1px #000000; height: 20px; "> <?php if(isset($_SESSION["lieu"])) echo $_SESSION["lieu"]; ?>  </td>
            </tr>
            <br>
            <tr >
                <td style="width: 35%; border: solid 1px #000000; height: 20px;">Date de la formation                </td>
                <td style="width: 65%; border: solid 1px #000000; height: 20px;">  <?php if(isset($_SESSION["date"])) echo $_SESSION["date"]; ?>  </td>
            </tr>
            <br>
            <tr >
                <td style="width: 35%; border: solid 1px #000000; height: 20px;">Organisme de Formation                </td>
                <td style="width: 65%; border: solid 1px #000000; height: 20px;"> <?php if(isset($_SESSION["organisme"])) echo $_SESSION["organisme"]; ?>  </td>
            </tr>
            <br>
            <tr >
                <td style="width: 35%; border: solid 1px #000000; height: 20px;">Nombre de Participants                </td>
                <td style="width: 65%; border: solid 1px #000000; height: 20px;">  <?php if(isset($_SESSION["nbrParticipants"])) echo $_SESSION["nbrParticipants"]; ?>  </td>
            </tr>
            <br>
            <tr >
                <td style="width: 35%; border: solid 1px #000000; height: 20px;">Entité                </td>
                <td style="width: 65%; border: solid 1px #000000; height: 20px;">  <?php if(isset($_SESSION["entite"])) echo $_SESSION["entite"]; ?>  </td>
            </tr>
            <br>
        </table>
        <br>
        <div style="width: 100%; text-align: center; text-decoration: underline; font-weight: bold; font-size: 15pt;">
            Evaluation de synthese
        </div>
        <div style="width: 100%; text-align: left; ">
            Noter le critère de 1 a 10(max)
        </div>
        <br>
        <!-- tableau des notes  -->
        <table cellspacing="0" style="padding: 0px; width: 100%; border: solid 1px #000000; font-size: 10pt; ">
            <tr >
                <td></td>
                <td style="width: 70%; border: solid 1px #000000; height: 20px; ">   </td>
                <td style="width: 5%; border: solid 1px #000000; height: 20px; text-align:center; background-color:#DFF0D8 "> NC </td>


            </tr>
            <?php
                $question = ["Qualité de l'animation","Qualité des supports de formation (films, présentations, photos,...)","Qualité de pertinence des exercices proposés",
                             "Intéret des sujets abordés","Les messages étaient-ils clairs et comprehénsibles ?","Les objectifs attendus ont-ils été atteints ?",
                             "Rytheme et durée de la formation","Participation et atmosphere du groupe","Apport de la formation pour votre travail quotidien",
                             "Intéret de la formation pour votre engagement personnel dans l'exercice de votre fontion"];
                 if(isset($_COOKIE["idForamtion"]) and $_COOKIE["idForamtion"]!="null"){
                     require_once "bootstrap.php";
                     include 'src/Formation.php';
                     include 'src/Personne.php';
                     include 'src/Evaluation.php';

                    $evaluations = $entityManager->getRepository('Evaluation')->findBy(array('formation' => $_COOKIE["idForamtion"]));

                }
                 for ($i=0; $i < 10 ; $i++) {
                     # code...

             ?>
            <tr >
                <td style="width: 5%; border: solid 1px #000000; height: 29px; text-align: center; background-color:#DFF0D8 "> <?php echo $i+1; ?> </td>
                <td style="width: 40%; border: solid 1px #000000;height: 20px; text-align: left;"> <?php echo $question[$i]; ?>  </td>
                <?php
                    if(isset($evaluations)){
                        $moyenne = 0;
                        for ($j=0; $j < count($evaluations); $j++) {
                            $notes = $evaluations[$j]->getNoteIndividuelle();
                            $moyenne += (int)$notes[$i];
                        }
                        echo '<td style="width: 5%; border: solid 1px #000000; height: 20px; text-align: center;">'.$moyenne/count($evaluations).'</td>';
                    }

                 ?>
            </tr>
            <?php  } ?>

        </table>
        <br>
        <table cellspacing="15" style="padding: 0px; width: 100%;  font-size: 10pt; ">
            <tr>
                <td style="width: 100%; height:10%; border: solid 1px #000000; text-align:left;vertical-align: top; text-decoration: underline; ">
                    Les 3 points forts de la formation :<br><br>
                    <div class="" style="text-decoration:">
                        <?php if(isset($_SESSION["questionIndividuelle11"])) echo $_SESSION["questionIndividuelle11"];?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 100%; height:10%; border: solid 1px #000000; text-align:left;vertical-align: top; text-decoration: underline; ">
                    Les 3 points a améliorer :<br><br>
                    <div class="" style="text-decoration:">
                        <?php if(isset($_SESSION["questionIndividuelle12"])) echo $_SESSION["questionIndividuelle12"];?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 100%; height:10%; border: solid 1px #000000; text-align:center;vertical-align: top; text-decoration: underline; ">
                    Suggestions et commentaires : <br>
                    <span style="text-decoration:"> Autres sujets a aborder lors de cette formation</span>
                    <br><br>
                    <div class="" style="text-align:left; text-decoration:">
                        <?php if(isset($_SESSION["questionIndividuelle13"])) echo $_SESSION["questionIndividuelle13"];?>
                    </div>
                </td>
            </tr>

        </table>

    </page_header>
</page>
