<?php
  /*
   * Paging
   */
  require_once "bootstrap.php";
  include "src/Formation.php";
  $iTotalRecords = 178;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);

  $records = array();
  $records["data"] = array();

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  $status_list = array(
    array("success" => "Pending"),
    array("info" => "Closed"),
    array("danger" => "On Hold"),
    array("warning" => "Fraud")
  );

  $formationRepository = $entityManager->getRepository('Formation');
  $formations = $formationRepository->findAll();
  $id = -1;
  foreach ($formations as $formation) {
    $id+=1;
    $status = $status_list[rand(0, 2)];
    $records["data"][] = array(
      '<input type="checkbox" name="id[]" value="'.$formation->getId().'">',
      $formation->getTheme(),
      $formation->getPopulation(),
      $formation->getDateDebut()." to ".$formation->getDateFin(),
      $formation->getObjectif(),
      $formation->getFormateur(),
      $formation->getOrganisme(),
      "vide",
      '<a href="javascript:;" class="btn btn-xs default"><i class="fa fa-search"></i> View</a>',
   );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
     // pass custom message(useful for getting status of group actions)
    if(isset($_REQUEST['customActionName']) and $_REQUEST['customActionName']=="modifier"){
        $formation = new Formation();
        $formation = $entityManager->getRepository('Formation')->findOneBy(array('id' => $_REQUEST["id"]));
        $records["customActionMessage"] = "les donnee sont modifier";
        $entityManager->remove($formation);
        $entityManager->flush();
        // header("Location: http://www.example.com/");
        // exit();
        // die();

    }
    else if(isset($_REQUEST['customActionName']) and $_REQUEST['customActionName']=="supprimer"){
        $formation = new Formation();
        $formation = $entityManager->getRepository('Formation')->findOneBy(array('id' => $_REQUEST["id"]));
        // $personne = $entityManager->find('Personne', (string)$_REQUEST["id"]);

        $entityManager->remove($formation);
        $entityManager->flush();
        $records["customActionMessage"] = "les donnee sont supprimer";

    }

  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;

  echo json_encode($records);
?>
