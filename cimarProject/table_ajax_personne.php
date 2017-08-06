<?php
  /*
   * Paging
   */
  require_once "bootstrap.php";
  include "src/Personne.php";
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

  $personneRepository = $entityManager->getRepository('Personne');
  $personnes = $personneRepository->findAll();
  $id = -1;
  $records["data"][] =[]
  foreach ($personnes as $personne) {
    $id+=1;
    $status = $status_list[rand(0, 2)];
     = array(
      '<input type="checkbox" name="id[]" value="'.$personne->getMatrecule().'">',
      $personne->getMatrecule(),
      $personne->getNomPrenom(),
      $personne->getDateEmbache(),
      $personne->getDateNaissance(),
      $personne->getCNSS(),
      $personne->getPoste(),
      $personne->getDepartement(),
      '<a href="javascript:;" class="btn btn-xs default"><i class="fa fa-search"></i> View</a>',
   );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
     // pass custom message(useful for getting status of group actions)
    if(isset($_REQUEST['customActionName']) and $_REQUEST['customActionName']=="modifier"){
        $personne = new Personne();
        $personne = $entityManager->getRepository('Personne')->findOneBy(array('matrecule' => $_REQUEST["id"]));
        $records["customActionMessage"] = "les donnee sont modifier";
        $entityManager->remove($personne);
        $entityManager->flush();
        // header("Location: http://www.example.com/");
        // exit();
        // die();

    }
    else if(isset($_REQUEST['customActionName']) and $_REQUEST['customActionName']=="supprimer"){
        $personne = new Personne();
        $personne = $entityManager->getRepository('Personne')->findOneBy(array('matrecule' => $_REQUEST["id"]));
        // $personne = $entityManager->find('Personne', (string)$_REQUEST["id"]);

        $entityManager->remove($personne);
        $entityManager->flush();
        $records["customActionMessage"] = "les donnee sont supprimer";

    }

  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  echo json_encode($records);
?>
