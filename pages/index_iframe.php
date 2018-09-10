<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>



<?php
session_start();

/*NOT logged in, login page*/
if(!isset($_SESSION['u_id'])) {
	include_once 'login_page.php';


} else {
	/*user logged in*/
	switch ($_SESSION['u_type']) {
		/*USER: ADMIN*/
		case 'admin':
		switch ($_GET['page']) {
			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
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




		/*USER COORDINATOR*/
		case 'coordinator':
		switch ($_GET['page']) {
			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
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





		/*USER: CONTROLLER*/ 
		case 'controller':
		switch ($_GET['page']) {
			/*HOME PAGE*/
			case 'home':
			include_once 'home_page.php';
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
		

		/*USER DELETED*/
		case 'suspended':
		echo "Sorry, your account has been suspended, please contact your manager.";
		break;
		

		default:
		echo "YOU DO NOT HAVE PERMITIONS TO VISIT THIS PAGE!";
		break;
	}

}
