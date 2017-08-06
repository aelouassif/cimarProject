<?php
 ?>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; font-size: 17pt; margin-bottom:5px;">
            <tr>
                <td style="text-align: center; text-decoration: underline;   width: 100%; color:#000;">FICHE D'EVALUATION DU TRANSFERT DU SAVOIR FAIRE SUR LES SITUATIONS DE TRAVAIL</td>
            </tr>
            <br><br><br>
        </table>
        <table cellspacing="0" style="padding: 0px; width: 100%;  font-size: 10pt; ">
            <tr>
                <td style="width: 30%;  height: 20px; ">Nom et Prenom :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["nomPrenom"])) echo $_SESSION["nomPrenom"]; ?>  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">Poste Occupe :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["poste"])) echo $_SESSION["poste"]; ?>  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">service :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["service"])) echo $_SESSION["service"]; ?>  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">               </td>
                <td style="width: 70%;  height: 20px; "> _______________________________  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">THEME  :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["entite"])) echo $_SESSION["entite"]; ?>  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">PERIODE  :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["date"])) echo $_SESSION["date"]; ?>  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">               </td>
                <td style="width: 70%;  height: 20px; "> _______________________________  </td>
            </tr>
            <tr>
                <td style="width: 30%;  height: 20px; ">Animation :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["animateur"])) echo $_SESSION["animateur"]; ?>  </td>
            </tr>
            <tr >
                <td style="width: 30%;  height: 20px; ">Organisme :               </td>
                <td style="width: 70%;  height: 20px; "> <?php if(isset($_SESSION["organisme"])) echo $_SESSION["organisme"]; ?>  </td>
            </tr>


        </table>
        <br>
        <div style="width: 100%; text-align: center; text-decoration: underline; font-weight: bold; font-size: 15pt;">
            OBJECTIFS DE LA SESSION
        </div>

        <div style="width: 100%; text-align: center; font-weight: bold; font-size: 10pt;">
            - <?php echo "cette partie a remplire";  ?>
        </div>
        <div style=" width:100%; text-align:center;  height: 20px; "> ______________________________________________________________  </div>
        <div style="width: 100%; text-align: center; text-decoration: underline; font-weight: bold; font-size: 15pt;color:#555">
            ANNOTATIONS DU RESOPNSABLE HIERARCHIQUE
        </div>
        <div style="width: 100%;  text-align:left; font-size: 12pt;">
            - NOTE DE 1 A 10 SUIVANT L'APPRECIATION <br>
        </div>
        <div style="width:50%; text-align:left; padding-left:100px;font-size: 10pt;   ">
            10 = Excellent <br>
            01 = Médiocre(inadapté)
        </div>

        <!-- tableau des notes  -->
        <table cellspacing="0" style="padding: 0px; width: 100%; font-size: 12pt; ">
            <tr>
                <td style="width: 80%;  height: 20px;">- Objectifs de la session sont-ils atteints?</td>
                <td style="width: 20%;  height: 20px;"> oui </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">- Apport de connaissance transformable en situation professionnelle :</td>
                <td style="width: 20%;  height: 20px;">  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Theorique :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Pratique :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Apport des ratios :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>

            <tr>
                <td style="width: 80%;  height: 20px;">- APPRECIATION GENERALE :</td>
                <td style="width: 20%;  height: 20px;">  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Points forts :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Points faibles :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>
            <tr>
                <td style="width: 80%;  height: 20px;">
                    <ul>
                        <li>Vos suggestions :</li>
                    </ul>
                 </td>
                <td style="width: 20%;  height: 20px;"> qlq  </td>
            </tr>
        </table>






    </page_header>
</page>
