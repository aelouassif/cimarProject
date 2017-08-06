<?php
	session_start();
 ?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Data Tables - Ajax Datatables</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include 'main.php'; ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->

			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">

						<div class="portlet-body">
							<div class="table-container">
								<div class="table-actions-wrapper">
									<span>
									</span>
									<select class="table-group-action-input form-control input-inline input-small input-sm">
										<option value="">Select...</option>
										<option value="modifier">modifier</option>
										<option value="supprimer">supprimer</option>
									</select>
									<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
								</div>
								<div id="addTableau" class="Metronic-alerts alert alert-success fade in" hidden="true"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
									<i class="fa-lg fa fa-check"></i>  Group action successfully has been completed. Well done!
								</div>
									<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
										<thead>
											<tr role="row" class="heading">
												<th width="2%">
													<input type="checkbox" class="group-checkable">
												</th>
												<th width="5%">
													 Theme
												</th>
												<th width="10%">
													 Population
												</th>
												<th width="15%">
													 Date
												</th>
												<th width="15%">
													 Objectifs
												</th>
												<th width="10%">
													 Formateur
												</th>
												<th width="10%">
													 Organisme
												</th>
												<th width="10%">
													 Liste Personne
												</th>
												<th width="10%">
													 action
												</th>
											</tr>


											<tr role="row" class="filter">

												<?php
													require_once "bootstrap.php";
													use Doctrine\ORM\EntityRepository;

													$formationRepository = $entityManager->getRepository('Formation');
													$formations = $formationRepository->findBy(array(), array('theme' => 'ASC'));
													echo '<tr role="row" >';

													echo '<td >';

													echo '</td>';

													echo '<td >';
													echo '<select id="theme" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getId().'" data-tag="'.$formations[$i]->getTheme().'">'.$formations[$i]->getTheme().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="population" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getPopulation().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getPopulation().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="dateDebut" class="form-control form-filter input-sm">';

													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getDateDebut().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getDateDebut().'</option>';
													}
													echo '</select>';

													echo '<select id="dateFin" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getDateFin().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getDateFin().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="objectif" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getObjectif().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getObjectif().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="formateur" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getFormateur().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getFormateur().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="organisme" class="form-control form-filter input-sm">';
													for ($i=0;$i<count($formations);$i++) {
														echo '<option value="'.$formations[$i]->getOrganisme().'" data-tag="'.$formations[$i]->getId().'">'.$formations[$i]->getOrganisme().'</option>';
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '<select id="listPersonne" class="form-control form-filter input-sm" >';
													for ($i=0;$i<count($formations);$i++) {
														$personnes = $formations[$i]->getPersonnes();
														for ($j=0; $j < count($personnes); $j++) {
															echo '<option value="'.$personnes[$j]->getId().'" data-tag="'.$formations[$i]->getId().'">'.$personnes[$j]->getNomPrenom().'</option>';

														}
													}
													echo '</select>';
													echo '</td>';

													echo '<td >';
													echo '
													<a href="" onclick="ok()" class="btn green" >
														charger les tableaux  <i class="fa fa-edit"></i>
													</a>

													<a href="evaluationFormationPDF.php" onclick="evaluationFormationPDF()" class="btn blue" >
														Fiche synthese d\'evaluation de la session  <i class="fa fa-file-pdf-o"></i>
													</a>
													</a>';
													echo '</td>';

													echo '</tr>';
												 ?>
											</tr>
										</thead>
									<tbody>
								</tbody>
								</table>
								<!-- // gestion des notes -->
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<form class="" action="evaluationIndividuellePDF.php" method="POST">
										<!-- BEGIN EXAMPLE TABLE PORTLET-->
											<div class="portlet box yellow">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-user"></i> Note individuel
													</div>
													<div class="actions">
														<a href="javascript:saveNoteIndividuel();" class="btn btn-default btn-sm" >
															Add  <i class="fa fa-pencil"></i>
														</a>
														<button type="submit" class="btn btn-default btn-sm" name="button">PDF  <i class="fa fa-file-pdf-o"></i></button>
													</div>

												</div>
												<div class="portlet-body">
														<?php
															if(isset($_COOKIE["idPersonne"]) and $_COOKIE["idPersonne"]!="null" and isset($_COOKIE["idForamtion"]) and $_COOKIE["idForamtion"]!="null"){
																$personne = $entityManager->getRepository('Personne')->findOneBy(array('id' => $_COOKIE["idPersonne"]));
																$formation = $entityManager->getRepository('Formation')->findOneBy(array('id' => $_COOKIE["idForamtion"]));
																$evaluation = $entityManager->getRepository('Evaluation')->findOneBy(array('personne' => $_COOKIE["idPersonne"],'formation' => $_COOKIE["idForamtion"]));
																if(isset($evaluation)){
																	$noteIndividuelle = $evaluation->getNoteIndividuelle();
																	// print_r($noteIndividuelle);
																	$noteResponsable = $evaluation->getNoteResponsable();
																	// print_r($noteResponsable);

																}
															}
													 	?>

															<table class="table table-striped table-bordered table-hover" id="sample_2">
																<thead>
																<tr>
																	<th>
																		 Question
																	</th>
																	<th>
																		 Reponse
																	</th>
																</tr>
																</thead>
																<tbody>
																	<tr class="odd gradeX">
																		<!-- hidden input -->
																		<?php if(isset($personne)) $_SESSION["nomPrenom"] =  $personne->getNomPrenom(); ?>
																		<?php if(isset($formation)) $_SESSION["date"] =  $formation->getDateDebut(). " a " . $formation->getDateFin(); ?>
																		<?php if(isset($formation)) $_SESSION["organisme"] =  $formation->getOrganisme(); ?>
																		<?php if(isset($formation)) $_SESSION["nbrParticipants"] =  count($formation->getPersonnes()); ?>
																		<?php if(isset($formation)) $_SESSION["entite"] =  $formation->getTheme(); ?>
																		<td style="height:5" >
																			  Qualité de l'animation
																		</td>
																		<td>
																			<input id="questionIndividuelle1" class="form-control form-filter input-sm" type="text" name="questionIndividuelle1" value="<?php if(isset($noteIndividuelle[0])) echo $noteIndividuelle[0]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Qualité des supports de formation (films, présentations, photos,...)
																		</td>
																		<td>
																			<input id="questionIndividuelle2" class="form-control form-filter input-sm" type="text" name="questionIndividuelle2" value="<?php if(isset($noteIndividuelle[1])) echo $noteIndividuelle[1]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Qualité de pertinence des exercices proposés
																		</td>
																		<td>
																			<input id="questionIndividuelle3" class="form-control form-filter input-sm" type="text" name="questionIndividuelle3" value="<?php if(isset($noteIndividuelle[2])) echo $noteIndividuelle[2]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Intéret des sujets abordés
																		</td>
																		<td>
																			<input id="questionIndividuelle4" class="form-control form-filter input-sm" type="text" name="questionIndividuelle4" value="<?php if(isset($noteIndividuelle[3])) echo $noteIndividuelle[3]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Les messages étaient-ils clairs et comprehénsibles ?
																		</td>
																		<td>
																			<input id="questionIndividuelle5" class="form-control form-filter input-sm" type="text" name="questionIndividuelle5" value="<?php if(isset($noteIndividuelle[4])) echo $noteIndividuelle[4]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Les objectifs attendus ont-ils été atteints ?
																		</td>
																		<td>
																			<input id="questionIndividuelle6" class="form-control form-filter input-sm" type="text" name="questionIndividuelle6" value="<?php if(isset($noteIndividuelle[5])) echo $noteIndividuelle[5]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Rytheme et durée de la formation
																		</td>
																		<td>
																			<input id="questionIndividuelle7" class="form-control form-filter input-sm" type="text" name="questionIndividuelle7" value="<?php if(isset($noteIndividuelle[6])) echo $noteIndividuelle[6]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Participation et atmosphere du groupe
																		</td>
																		<td>
																			<input id="questionIndividuelle8" class="form-control form-filter input-sm" type="text" name="questionIndividuelle8" value="<?php if(isset($noteIndividuelle[7])) echo $noteIndividuelle[7]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Apport de la formation pour votre travail quotidien
																		</td>
																		<td>
																			<input id="questionIndividuelle9" class="form-control form-filter input-sm" type="text" name="questionIndividuelle9" value="<?php if(isset($noteIndividuelle[8])) echo $noteIndividuelle[8]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			  Intéret de la formation pour votre engagement personnel dans l'exercice de votre fontion
																		</td>
																		<td>
																			<input id="questionIndividuelle10" class="form-control form-filter input-sm" type="text" name="questionIndividuelle10" value="<?php if(isset($noteIndividuelle[9])) echo $noteIndividuelle[9]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			   Les 3 points forts de la formation :
																		</td>
																		<td>
																			<input id="questionIndividuelle11" class="form-control form-filter input-sm" type="text" name="questionIndividuelle11" value="<?php if(isset($noteIndividuelle[10])) echo $noteIndividuelle[10]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			   Les 3 points a améliorer :
																		</td>
																		<td>
																			<input id="questionIndividuelle12" class="form-control form-filter input-sm" type="text" name="questionIndividuelle12" value="<?php if(isset($noteIndividuelle[11])) echo $noteIndividuelle[11]; ?>">
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td>
																			   Suggestions et commentaires :
																		</td>
																		<td>
																			<input id="questionIndividuelle13" class="form-control form-filter input-sm" type="text" name="questionIndividuelle13" value="<?php if(isset($noteIndividuelle[12])) echo $noteIndividuelle[12]; ?>">
																		</td>
																	</tr>

																</tbody>
														</table>
														</form>
												</div>
										</div>

										<!-- END EXAMPLE TABLE PORTLET-->
								</div>
									<form class="" action="evaluationResponsablePDF.php" method="post">
										<div class="col-md-6 col-sm-12">
										<!-- BEGIN EXAMPLE TABLE PORTLET-->
										<div class="portlet box purple">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-cogs"></i> Note responsable
											</div>
											<div class="actions">
												<a href="javascript:saveNoteResponsable();" class="btn btn-default btn-sm" >
													Add  <i class="fa fa-pencil"></i>
												</a>
												<button type="submit" class="btn btn-default btn-sm" name="button">PDF  <i class="fa fa-file-pdf-o"></i></button>
											</div>

										</div>
										<div class="portlet-body">

											<table class="table table-striped table-bordered table-hover" id="sample_3">
												<thead>
												<tr>
													<th>
														 Question
													</th>
													<th>
														 Reponse
													</th>
												</tr>
												</thead>
												<tbody>
													<tr class="odd gradeX">

														<tr class="odd gradeX">
															<td width="50%">
																 Les objectifs de la session dont-ils atteints ?
															</td>
															<td>
																<input id="questionResponsable1" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[0])) echo $noteResponsable[0]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Apport de connaissances transformable en situation professionnelle Theorique
															</td>
															<td>
																<input id="questionResponsable2" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[1])) echo $noteResponsable[1]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Apport de connaissances transformable en situation professionnelle Pratique
															</td>
															<td>
																<input id="questionResponsable3" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[2])) echo $noteResponsable[2]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Apport de connaissances transformable en situation professionnelle Apport des ratios
															</td>
															<td>
																<input id="questionResponsable4" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[3])) echo $noteResponsable[3]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Point forts :
															</td>
															<td>
																<input id="questionResponsable5" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[4])) echo $noteResponsable[4]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Point faibles :
															</td>
															<td>
																<input id="questionResponsable6" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[5])) echo $noteResponsable[5]; ?>">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td>
																 Vos suggestions :
															</td>
															<td>
																<input id="questionResponsable7" class="form-control form-filter input-sm" type="text" name="" value="<?php if(isset($noteResponsable[6])) echo $noteResponsable[6]; ?>">
															</td>
														</tr>
													</tr>

												</tbody>
											</table>

										</div>
									</div>
									</form>
										<!-- END EXAMPLE TABLE PORTLET-->
									</div>

									<?php
										for ($i=0; $i < 100; $i++) {
											echo "<br/>";
										}

									 ?>

								</div>


							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<div class="page-quick-sidebar-wrapper">
		<div class="page-quick-sidebar">
			<div class="nav-justified">
				<ul class="nav nav-tabs nav-justified">
					<li class="active">
						<a href="#quick_sidebar_tab_1" data-toggle="tab">
						Users <span class="badge badge-danger">2</span>
						</a>
					</li>
					<li>
						<a href="#quick_sidebar_tab_2" data-toggle="tab">
						Alerts <span class="badge badge-success">7</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						More<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-bell"></i> Alerts </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-info"></i> Notifications </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-speech"></i> Activities </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-settings"></i> Settings </a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
						<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
							<h3 class="list-heading">Staff</h3>
							<ul class="media-list list-items">
								<li class="media">
									<div class="media-status">
										<span class="badge badge-success">8</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar3.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Bob Nilson</h4>
										<div class="media-heading-sub">
											 Project Manager
										</div>
									</div>
								</li>
								<li class="media">
									<img class="media-object" src="assets/admin/layout/img/avatar1.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Nick Larson</h4>
										<div class="media-heading-sub">
											 Art Director
										</div>
									</div>
								</li>
								<li class="media">
									<div class="media-status">
										<span class="badge badge-danger">3</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar4.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Deon Hubert</h4>
										<div class="media-heading-sub">
											 CTO
										</div>
									</div>
								</li>
								<li class="media">
									<img class="media-object" src="assets/admin/layout/img/avatar2.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Ella Wong</h4>
										<div class="media-heading-sub">
											 CEO
										</div>
									</div>
								</li>
							</ul>
							<h3 class="list-heading">Customers</h3>
							<ul class="media-list list-items">
								<li class="media">
									<div class="media-status">
										<span class="badge badge-warning">2</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar6.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Lara Kunis</h4>
										<div class="media-heading-sub">
											 CEO, Loop Inc
										</div>
										<div class="media-heading-small">
											 Last seen 03:10 AM
										</div>
									</div>
								</li>
								<li class="media">
									<div class="media-status">
										<span class="label label-sm label-success">new</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar7.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Ernie Kyllonen</h4>
										<div class="media-heading-sub">
											 Project Manager,<br>
											 SmartBizz PTL
										</div>
									</div>
								</li>
								<li class="media">
									<img class="media-object" src="assets/admin/layout/img/avatar8.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Lisa Stone</h4>
										<div class="media-heading-sub">
											 CTO, Keort Inc
										</div>
										<div class="media-heading-small">
											 Last seen 13:10 PM
										</div>
									</div>
								</li>
								<li class="media">
									<div class="media-status">
										<span class="badge badge-success">7</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar9.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Deon Portalatin</h4>
										<div class="media-heading-sub">
											 CFO, H&D LTD
										</div>
									</div>
								</li>
								<li class="media">
									<img class="media-object" src="assets/admin/layout/img/avatar10.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Irina Savikova</h4>
										<div class="media-heading-sub">
											 CEO, Tizda Motors Inc
										</div>
									</div>
								</li>
								<li class="media">
									<div class="media-status">
										<span class="badge badge-danger">4</span>
									</div>
									<img class="media-object" src="assets/admin/layout/img/avatar11.jpg" alt="...">
									<div class="media-body">
										<h4 class="media-heading">Maria Gomez</h4>
										<div class="media-heading-sub">
											 Manager, Infomatic Inc
										</div>
										<div class="media-heading-small">
											 Last seen 03:10 AM
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="page-quick-sidebar-item">
							<div class="page-quick-sidebar-chat-user">
								<div class="page-quick-sidebar-nav">
									<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
								</div>
								<div class="page-quick-sidebar-chat-user-messages">
									<div class="post out">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Bob Nilson</a>
											<span class="datetime">20:15</span>
											<span class="body">
											When could you send me the report ? </span>
										</div>
									</div>
									<div class="post in">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar2.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Ella Wong</a>
											<span class="datetime">20:15</span>
											<span class="body">
											Its almost done. I will be sending it shortly </span>
										</div>
									</div>
									<div class="post out">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Bob Nilson</a>
											<span class="datetime">20:15</span>
											<span class="body">
											Alright. Thanks! :) </span>
										</div>
									</div>
									<div class="post in">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar2.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Ella Wong</a>
											<span class="datetime">20:16</span>
											<span class="body">
											You are most welcome. Sorry for the delay. </span>
										</div>
									</div>
									<div class="post out">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Bob Nilson</a>
											<span class="datetime">20:17</span>
											<span class="body">
											No probs. Just take your time :) </span>
										</div>
									</div>
									<div class="post in">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar2.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Ella Wong</a>
											<span class="datetime">20:40</span>
											<span class="body">
											Alright. I just emailed it to you. </span>
										</div>
									</div>
									<div class="post out">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Bob Nilson</a>
											<span class="datetime">20:17</span>
											<span class="body">
											Great! Thanks. Will check it right away. </span>
										</div>
									</div>
									<div class="post in">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar2.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Ella Wong</a>
											<span class="datetime">20:40</span>
											<span class="body">
											Please let me know if you have any comment. </span>
										</div>
									</div>
									<div class="post out">
										<img class="avatar" alt="" src="assets/admin/layout/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name">Bob Nilson</a>
											<span class="datetime">20:17</span>
											<span class="body">
											Sure. I will check and buzz you if anything needs to be corrected. </span>
										</div>
									</div>
								</div>
								<div class="page-quick-sidebar-chat-user-form">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Type a message here...">
										<div class="input-group-btn">
											<button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
						<div class="page-quick-sidebar-alerts-list">
							<h3 class="list-heading">General</h3>
							<ul class="feeds list-items">
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 4 pending tasks. <span class="label label-sm label-warning ">
													Take action <i class="fa fa-share"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 Just now
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Finance Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-shopping-cart"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 New order received with <span class="label label-sm label-success">
													Reference Number: DR23923 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 30 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-bell-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
													Overdue </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 2 hours
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 IPO Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
							</ul>
							<h3 class="list-heading">System</h3>
							<ul class="feeds list-items">
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 4 pending tasks. <span class="label label-sm label-warning ">
													Take action <i class="fa fa-share"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 Just now
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Finance Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-shopping-cart"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 New order received with <span class="label label-sm label-success">
													Reference Number: DR23923 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 30 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 You have 5 pending membership that requires a quick review.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 24 mins
										</div>
									</div>
								</li>
								<li>
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-warning">
													<i class="fa fa-bell-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
													Overdue </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 2 hours
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc">
													 IPO Report for year 2013 has been released.
												</div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date">
											 20 mins
										</div>
									</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
						<div class="page-quick-sidebar-settings-list">
							<h3 class="list-heading">General Settings</h3>
							<ul class="list-items borderless">
								<li>
									 Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
							</ul>
							<h3 class="list-heading">System Settings</h3>
							<ul class="list-items borderless">
								<li>
									 Security Level
									<select class="form-control input-inline input-sm input-small">
										<option value="1">Normal</option>
										<option value="2" selected>Medium</option>
										<option value="e">High</option>
									</select>
								</li>
								<li>
									 Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
								</li>
								<li>
									 Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
								</li>
								<li>
									 Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
								<li>
									 Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
								</li>
							</ul>
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Metronic by keenthemes.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/global/scripts/datatable.js"></script>
<script src="assets/admin/pages/scripts/table-ajax-evaluation.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
           TableAjax.init();
        });
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
