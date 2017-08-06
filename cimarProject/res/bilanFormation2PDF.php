<?php
 ?>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; font-size: 15pt; border: solid 1px black; background-color:green; margin-bottom:5px;">
            <tr>
                <td style="text-align: center;    width: 100%; color:#ffffff;"> BILAN FORMATION </td>
            </tr>
            <br><br><br>
        </table>

        <table cellspacing="0" style="padding: 0px; width: 100%; border: solid 1px #000000; font-size: 14pt; ">
            <tr>
                <td style="width: 100%; border: solid 1px #000000;  text-align:center;background-color:#DFF0D8 "> THEMES  </td>
            </tr>
        </table>
        <!-- tableau des notes  -->
        <table cellspacing="0" style="padding: 0px; width: 100%; border: solid 1px #000000; font-size: 10pt; ">
            <tr >
                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center;background-color:#DFF0D8 "> Date  </td>
                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center;background-color:#DFF0D8 "> Intitule de la formation  </td>
                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center;background-color:#DFF0D8 "> matricule  </td>
                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center;background-color:#DFF0D8 "> Nom et Prenom  </td>

            </tr> <br>
            <?php
                require_once "bootstrap.php";
                include 'src/Formation.php';
                include 'src/Personne.php';
                include 'src/Evaluation.php';
                $foRepository = $entityManager->getRepository('Personne');
                $formations = $entityManager->getRepository('Formation')->findBy(array(), array('theme' => 'ASC'));

                function days($x) {
                    if (get_class($x) != 'DateTime') {
                        return false;
                    }

                    $y = $x->format('Y') - 1;
                    $days = $y * 365;
                    $z = (int)($y / 4);
                    $days += $z;
                    $z = (int)($y / 100);
                    $days -= $z;
                    $z = (int)($y / 400);
                    $days += $z;
                    $days += $x->format('z');

                    return $days;
                }

                function days_diff($d1, $d2) {
                    $x1 = days($d1);
                    $x2 = days($d2);

                    if ($x1 && $x2) {
                        return abs($x1 - $x2);
                    }
                }

                $date_expire = '2014-08-06 00:00:00';
                $date = new DateTime($date_expire);

                for ($i=0; $i < count($formations); $i++) {
                    # code...

                    $start = new DateTime($formations[$i]->getDateDebut());
                    $end = new DateTime($formations[$i]->getDateFin()." 01:00:00");




             ?>

            <tr >
                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center; background-color:#DFF0D8 "> <?php
                    if($formations[$i]->getDateDebut()==$formations[$i]->getDateFin())
                        echo $formations[$i]->getDateFin();
                    else {
                        echo "du ". $formations[$i]->getDateDebut() ." <br> au <br> ". $formations[$i]->getDateFin();
                    }
                 ?> </td>

                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center;background-color:#DFF0D8 "> <?php echo $formations[$i]->getTheme(); ?>  </td>

                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center; background-color:#DFF0D8 "> <?php foreach ($formations[$i]->getPersonnes() as $formation) {
                    echo $formation->getMatrecule()."<br/>";} ?> </td>

                <td style="width: 25%; border: solid 1px #000000; height:50px; text-align:center; background-color:#DFF0D8 "> <?php foreach ($formations[$i]->getPersonnes() as $formation) {
                    echo $formation->getNomPrenom()."<br/>";} ?> </td>

            </tr>

            <tr >
            </tr>
            <?php  } ?>

        </table>
        <br>


    </page_header>
</page>
