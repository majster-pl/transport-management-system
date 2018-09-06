<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/style-NEW.css"> -->
</head>



<?php
session_start();
// echo $_GET['page'];

// $headers = apache_request_headers();

// foreach ($headers as $header => $value) {
// 	if ($header == 'Referer') {
// 		echo "$value <br />\n";
// 	}
// }


if(!isset($_SESSION['u_id'])) {
	echo '
	<html>
	<body>
	<div id="welcome_msg">

	<p> Welcome to Transport Managment System 2018</p>
	</div>
	<div class="login_container">
	<div id="login_img">
	<img class="selectDisable" src="../images/login.png" alt="logo" title="logo" />
	</div>
	<form class="selectDisable" action="../includes/login.inc.php" method="POST">
	<p>Username</p>
	<input type="text" name="uid" placeholder="username or e-mail">
	<p>Password</p>
	<input type="password" name="pwd" placeholder="password">
	<div>
	<body>
	</html>
	';

	$url = $_SERVER['QUERY_STRING'];
	if($url == "login=error") {
		echo '
		<a class="error-label-class">Incorect username or password</a>
		';

	} elseif ($url == "login=empty") {
		echo '
		<a class="error-label-class">Please enter ursername and password</a>
		';
	};


	echo
	'<button type="submit" name="submit">Login</button>								
	</div>
	</form>
	</div>

	';


} else {
	// $url = $_GET['page'];

	switch ($_SESSION['u_type']) {
		/*USER: ADMIN*/
		case 'admin':
		switch ($_GET['page']) {
			/*YARD*/
			case 'bays':
			include_once 'shunt_bays.php';
			break;
			/*Service*/
			case 'service':
			include_once 'shunt_service.php';
			break;
			/*VORs*/
			case 'vor':
			include_once 'shunt_vor.php';
			break;
			/*EMPTYs*/
			case 'empty':
			include_once 'shunt_empty.php';
			break;


			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;
			/*ADD NEW NEWS PAGE*/
			case 'add_news':
			include_once 'add_new_news_feed_page.php';
			break;
			/*EMPLOYEES LIST*/
			case 'emp_list':
			include_once 'list_of_employees_iframe.php';
			break;
			/*AGENCY EMPLOYEES LIST*/
			case 'agency_emp_list':
			include_once 'list_of_agency_employees_iframe.php';
			break;
			/*ADD EMPLOYEE*/
			case 'add_new_emp':
			include_once 'add_new_employee_page.php';
			break;
			/*EDIT EMPLOYEE*/
			case 'edit_emp':
			include_once 'edit_employee_page.php';
			break;
			/*VIEW EMPLOYEE CONTECT TO GO BELOW!*/
			case 'view_emp':
			include_once 'view_employee_page.php';
			break;
			/*VIEW TRAINING*/
			case 'view_training_page':
			include_once 'view_employee_training_page.php';
			break;



			/*UNITS LIST*/
			case 'vehicle_list':
			include_once 'list_of_vehicles_iframe.php';
			break;
			/*TRAILERS LIST*/
			case 'trailers_list':
			include_once 'list_of_trailers_iframe.php';
			break;
			/*ADD VEHICLE*/
			case 'add_new_vehicle':
			include_once 'add_new_vehicle_page.php';
			break;
			/*EDIT VEHICLE*/
			case 'edit_vehicle':
			include_once 'edit_vehicle_page.php';
			break;
			/*VIEW VEHICLE*/
			case 'view_vehicle':
			include_once 'view_vehicle_page.php';
			break;
			/*ADD FLEETCHECK*/
			case 'add_new_fleetcheck':
			include_once 'add_new_fleetcheck_page.php';
			break;
			/*VIEW FLEETCHECK*/
			case 'view_fleetcheck_page':
			include_once 'view_vehicle_fleetcheck_page.php';
			break;


			/*MAPS*/
			/*COLLECTIONS*/
			case 'maps_collectins':
			include_once 'list_of_maps_collectins.php';
			break;
			/*DELIVERIES*/
			case 'maps_deliveries':
			include_once 'list_of_maps_deliveries.php';
			break;
			/*ADD MAPS*/
			case 'maps_add_new':
			/*include_once 'add_new_map_page.php';*/
			include_once 'add_new_trainig_page.php';
			break;
			/*EDIT MAP*/
			case 'view_vehicle':
			include_once 'view_vehicle_page.php';
			break;


			/*CONTACTS*/
			case 'contacts_list':
			include_once 'list_of_contacts_iframe.php';
			break;
			/*ADD NEW*/
			case 'contacts_add_new':
			include_once 'add_new_contact.php';
			break;


			/*ABOUT PAGE*/
			case 'about':
			include_once 'about_page.php';
			break;


			/*CONTACT IT PAGE*/
			case 'contact_it':
			include_once 'contact_it.php';
			break;

			/*DEFAULT*/
			default:
			echo "Page not found!";
			break;

		}
		break;


		/*USER COORDINATOR*/
		case 'coordinator':
		switch ($_GET['page']) {
			/*YARD*/
			case 'bays':
			include_once 'shunt_bays.php';
			break;
			/*Service*/
			case 'service':
			include_once 'shunt_service.php';
			break;
			/*VORs*/
			case 'vor':
			include_once 'shunt_vor.php';
			break;
			/*EMPTYs*/
			case 'empty':
			include_once 'shunt_empty.php';
			break;


			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;
			/*ADD NEW NEWS PAGE*/
			case 'add_news':
			include_once 'add_new_news_feed_page.php';
			break;
			/*EMPLOYEE LIST*/
			case 'emp_list':
			include_once 'list_of_employees_iframe.php';
			break;
			/*ADD EMPLOYEE*/
			case 'add_new_emp':
			include_once 'add_new_employee_page.php';
			break;
			/*AGENCY EMPLOYEES LIST*/
			case 'agency_emp_list':
			include_once 'list_of_agency_employees_iframe.php';
			break;
			/*EDIT EMPLOYEE*/
			case 'edit_emp':
			include_once 'edit_employee_page.php';
			break;
			/*VIEW EMPLOYEE CONTECT TO GO BELOW!*/
			case 'view_emp':
			include_once 'view_employee_page.php';
			break;
			/*VIEW TRAINING*/
			case 'view_training_page':
			include_once 'view_employee_training_page.php';
			break;



			/*UNITS LIST*/
			case 'vehicle_list':
			include_once 'list_of_vehicles_iframe.php';
			break;
			/*TRAILERS LIST*/
			case 'trailers_list':
			include_once 'list_of_trailers_iframe.php';
			break;
			/*ADD VEHICLE*/
			case 'add_new_vehicle':
			include_once 'add_new_vehicle_page.php';
			break;
			/*EDIT VEHICLE*/
			case 'edit_vehicle':
			include_once 'edit_vehicle_page.php';
			break;
			/*VIEW VEHICLE*/
			case 'view_vehicle':
			include_once 'view_vehicle_page.php';
			break;
			/*ADD FLEETCHECK*/
			case 'add_new_fleetcheck':
			include_once 'add_new_fleetcheck_page.php';
			break;
			/*VIEW FLEETCHECK*/
			case 'view_fleetcheck_page':
			include_once 'view_vehicle_fleetcheck_page.php';
			break;


			/*MAPS*/
			/*COLLECTIONS*/
			case 'maps_collectins':
			include_once 'list_of_maps_collectins.php';
			break;
			/*DELIVERIES*/
			case 'maps_deliveries':
			include_once 'list_of_maps_deliveries.php';
			break;
			/*ADD MAPS*/
			case 'maps_add_new':
			/*include_once 'add_new_map_page.php';*/
			include_once 'add_new_map_page.php';
			break;
			/*EDIT MAP*/
			case 'view_vehicle':
			include_once 'view_vehicle_page.php';
			break;


			/*CONTACTS*/
			case 'contacts_list':
			include_once 'list_of_contacts_iframe.php';
			break;
			/*ADD NEW*/
			case 'contacts_add_new':
			include_once 'add_new_contact.php';
			break;


			/*ABOUT PAGE*/
			case 'about':
			include_once 'about_page.php';
			break;


			/*CONTACT IT PAGE*/
			case 'contact_it':
			include_once 'contact_it.php';
			break;

			/*DEFAULT*/
			default:
			echo "Page not found!";
			break;

		}
		break;



		/*USER: DEBRIEFED*/
		case 'debriefer':
		switch ($_GET['page']) {

			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;
			/*EMPLOYEE LIST*/
			case 'emp_list':
			include_once 'list_of_employees_iframe.php';
			break;
			/*AGENCY EMPLOYEES LIST*/
			case 'agency_emp_list':
			include_once 'list_of_agency_employees_iframe.php';
			break;


			/*UNITS LIST*/
			case 'vehicle_list':
			include_once 'list_of_vehicles_iframe.php';
			break;
			/*TRAILERS LIST*/
			case 'trailers_list':
			include_once 'list_of_trailers_iframe.php';
			break;
			/*VIEW VEHICLE*/
			case 'view_vehicle':
			include_once 'view_vehicle_page.php';
			break;
			/*VIEW FLEETCHECK*/
			case 'view_fleetcheck_page':
			include_once 'view_vehicle_fleetcheck_page.php';
			break;


			/*MAPS*/
			/*COLLECTIONS*/
			case 'maps_collectins':
			include_once 'list_of_maps_collectins.php';
			break;
			/*DELIVERIES*/
			case 'maps_deliveries':
			include_once 'list_of_maps_deliveries.php';
			break;


			/*CONTACTS*/
			case 'contacts_list':
			include_once 'list_of_contacts_iframe.php';
			break;


			/*ABOUT PAGE*/
			case 'about':
			include_once 'about_page.php';
			break;


			/*CONTACT IT PAGE*/
			case 'contact_it':
			include_once 'contact_it.php';
			break;

			/*DEFAULT*/
			default:
			echo "Page not found!";
			break;

		}
		break;




		/*USER: CONTROLLER*/ 
		case 'controller':
		switch ($_GET['page']) {
			/*BAYS*/
			case 'bays':
			include_once 'shunt_bays.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;

			/*DEFAULT*/
			default:
			echo "Sorry, you don’t have access to this page";
			break;
		}

		break;


		/*USER: GOODS IN CLERK*/ 
		case 'goods-in-clerk':
		switch ($_GET['page']) {
			/*BAYS*/
			case 'bays':
			include_once 'shunt_bays.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;

			/*DEFAULT*/
			default:
			echo "Sorry, you don’t have access to this page";
			break;
		}

		break;


		/*USER: SHUNTER*/
		case 'shunter':
		switch ($_GET['page']) {
			/*BAYS*/
			case 'bays':
			include_once 'shunt_bays.php';
			break;
			/*Service*/
			case 'service':
			include_once 'shunt_service.php';
			break;
			/*VORs*/
			case 'vor':
			include_once 'shunt_vor.php';
			break;
			/*EMPTYs*/
			case 'empty':
			include_once 'shunt_empty.php';
			break;
			/*NEWS PAGE*/
			case 'news':
			include_once 'news_page.php';
			break;

			/*DEFAULT*/
			default:
			echo "Sorry, you don’t have access to this page";
			break;
		}
		break;


		/*USER DELETED*/
		case 'deleted':
		echo "Sorry, your account has been removed, please contact your manager.";
		break;
		
		default:
		echo "YOU DO NOT HAVE PERMITIONS TO VISIT THIS PAGE!";
		break;
	}

}
