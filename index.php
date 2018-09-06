<?php
session_start();
?>

<!DOCTYPE html>
<html>

<title>Transport Management System - 2018</title>
<link rel="stylesheet" href="css/main.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>

</head>


<body>
	<div class="main_div">
		<div class="top_bar_div selectDisable">
			<!-- MENU BUTTON -->
			<div id="menu_btn_div" >
				<?php 
				if(isset($_SESSION['u_id'])) {
					echo '
					<a href="javascript:showNavBar()">
					<img id="menu_icon" src="images/icons/menu.png" alt="Menu" title="Menu" />
					</a>
					';
				}
				?>
			</div>
			<!-- LOGO (MIDDLE ON MOBILE LEFT ON DESKTOP) -->
			<div id="logo_img_div">
				<a href="./">
					<img id="logo_img" src="images/logo.png" alt="Menu" title="Home" />
				</a>
			</div>
			<!-- USER ACCOUNT MENU -->
			<?php 
			if(isset($_SESSION['u_id'])) {
				echo '
				<label id="user_name_label">Hi, ', $_SESSION['u_firstname'] ,' ', $_SESSION['u_lastname'] ,'</label>
				<div class="user_btn_div">
				<img src="images/icons/user-circle-color.png" alt="User Account" title="View you account"/>
				<div id="arrow-up"></div>
				<div class="dropdown-content">
				<!-- user picture -->
				<div class="user-menu-picture">
				<img src="images/me.jpg" alt="User Picture" title="User Picture" />
				</div>
				<!-- user information on the right -->
				<div class="user-menu-details">
				<p title="Your full name">', $_SESSION['u_firstname'] ,' ', $_SESSION['u_lastname'] ,'</p>
				<p title="your e-mail">', $_SESSION['u_email'] ,'</p>
				<p title="Your possition">', $_SESSION['u_type'] ,'</p>
				</div>
				<!-- NOTIFICATIONS! -->
				<div style="height: 300px; width: 100%; margin-top: 100px; margin-bottom: 10px; overflow: auto">
				<div class="alert-box error"><span>error: </span><b>4</b> digi cards expire in next.</div>
				<div class="alert-box success"><span>success: </span>Licence check completed in 15 days! - Well done team!</div>
				<div class="alert-box warning"><span>warning: </span>The Met Office issues warnings for rain, snow, wind, fog and ice. These warnings are given a colour depending on a combination of the likelihood of the event happening and the impact the conditions may have.</div>
				<div class="alert-box notice"><span>notice: </span>Write your notice message here.</div>							</div>
				<form action="includes/logout.inc.php" method="POST">
				<div class="user-menu-buttons">
				<button class="button-class" type="button" name="submit">My Account</button>
				<button class="button-class" type="submit" name="submit">Logout</button>
				</div>
				</form>
				</div>
				</div>
				';
			}
			?>

		</div>


		<!-- BOTTOM CONTENT INCLUDING SIDE_BAR -->
		<div class="bottom_content_div">

			<!-- SIDE MENU -->
			<?php 
			if (isset($_SESSION['u_id'])) {
				switch ($_SESSION['u_type']) {
					case 'admin':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*HOME*/
					.'<li><a id="btn_home" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "home")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Home</a>
					</li>'

					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>'

					/*EMPLOYEES*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "add_new_emp" || $_GET['page'] == "emp_list")) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_emp" class="menu_button disable-select">Employees<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>

					<ul id="submenu">
					<li><a id="btn_add_new_emp" class="'; if((isset($_GET['page'])) && $_GET['page'] == "add_new_emp") {echo "active";}; echo ' menu_button disable-select submenu_emp" onClick="javascript:setIframeUrl(this.id)">Add New</a></li>
					<li><a id="btn_emp_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "emp_list") {echo "active";}; echo ' menu_button disable-select submenu_emp" onClick="javascript:setIframeUrl(this.id)">List</a></li>
					</ul>
					</li>'

					/*VEHICLES*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "add_new_vehicle" || $_GET['page'] == "vehicle_list")) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Vehicles<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>


					<ul id="submenu">
					<li><a id="btn_add_new_vehicle" class="'; if((isset($_GET['page'])) && $_GET['page'] == "add_new_vehicle") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add New</a></li>
					<li><a id="btn_vehicle_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "vehicle_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Units</a></li>
					<li><a id="btn_trailers_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "trailers_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Trailers</a></li>
					</ul>
					</li>'


					/*MAPS*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "maps_collectins" || $_GET['page'] == "maps_deliveries") || $_GET['page'] == "maps_add_new" ) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Maps<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">
					<li><a id="btn_maps_collectins" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_collectins") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Collections</a></li>
					<li><a id="btn_maps_deliveries" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_deliveries") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Deliveries</a>
					</li>
					<li><a id="btn_maps_add_new" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_add_new") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add new</a>
					</li> </ul>
					</li>'


					/*CONTACTS*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "contacts_list" || $_GET['page'] == "maps_deliveries") || $_GET['page'] == "contacts_add_new" ) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Contacts<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">
					<li><a id="btn_contacts_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "contacts_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">List</a></li>
					<li><a id="btn_contacts_add_new" class="'; if((isset($_GET['page'])) && $_GET['page'] == "contacts_add_new") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add new</a>
					</li> </ul>
					</li>'

					/*ABOUT*/
					.'<li><a id="btn_about" class="'; if((isset($_GET['page'])) && $_GET['page'] == "about") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >About</a>
					</li>
					</ul>
					</nav>
					</div>
					';
					break;


					case 'coordinator':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*HOME*/
					.'<li><a id="btn_home" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "home")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Home</a>
					</li>'

					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>'

					/*EMPLOYEES*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "add_new_emp" || $_GET['page'] == "emp_list")) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_emp" class="menu_button disable-select">Employees<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>

					<ul id="submenu">
					<li><a id="btn_add_new_emp" class="'; if((isset($_GET['page'])) && $_GET['page'] == "add_new_emp") {echo "active";}; echo ' menu_button disable-select submenu_emp" onClick="javascript:setIframeUrl(this.id)">Add New</a></li>
					<li><a id="btn_emp_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "emp_list") {echo "active";}; echo ' menu_button disable-select submenu_emp" onClick="javascript:setIframeUrl(this.id)">List</a></li>
					</ul>
					</li>'

					/*VEHICLES*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "add_new_vehicle" || $_GET['page'] == "vehicle_list")) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Vehicles<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>


					<ul id="submenu">
					<li><a id="btn_add_new_vehicle" class="'; if((isset($_GET['page'])) && $_GET['page'] == "add_new_vehicle") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add New</a></li>
					<li><a id="btn_vehicle_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "vehicle_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Units</a></li>
					<li><a id="btn_trailers_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "trailers_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Trailers</a></li>
					</ul>
					</li>'


					/*MAPS*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "maps_collectins" || $_GET['page'] == "maps_deliveries") || $_GET['page'] == "maps_add_new" ) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Maps<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">
					<li><a id="btn_maps_collectins" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_collectins") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Collections</a></li>
					<li><a id="btn_maps_deliveries" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_deliveries") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Deliveries</a>
					</li>
					<li><a id="btn_maps_add_new" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_add_new") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add new</a>
					</li> </ul>
					</li>'


					/*CONTACTS*/
					.'<li><a style="'; if((isset($_GET['page'])) && (($_GET['page'] == "contacts_list") || $_GET['page'] == "contacts_add_new" )) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Contacts<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">
					<li><a id="btn_contacts_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "contacts_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">List</a></li>
					<li><a id="btn_contacts_add_new" class="'; if((isset($_GET['page'])) && $_GET['page'] == "contacts_add_new") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Add new</a>
					</li> </ul>
					</li>'

					/*ABOUT*/
					.'<li><a id="btn_about" class="'; if((isset($_GET['page'])) && $_GET['page'] == "about") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >About</a>
					</li>
					</ul>
					</nav>
					</div>
					';
					break;


					case 'debriefer':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*HOME*/
					.'<li><a id="btn_home" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "home")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Home</a>
					</li>'

					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>'

					/*EMPLOYEES*/
					.'<li><a id="btn_emp_list" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "emp_list")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Drivers List</a>
					</li>'


					/*VEHICLES*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "add_new_vehicle" || $_GET['page'] == "vehicle_list")) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Vehicles<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>


					<ul id="submenu">
					<li><a id="btn_vehicle_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "vehicle_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Units</a></li>
					<li><a id="btn_trailers_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "trailers_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Trailers</a></li>
					</ul>
					</li>'


					/*MAPS*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "maps_collectins" || $_GET['page'] == "maps_deliveries") || $_GET['page'] == "maps_add_new" ) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Maps<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">

					<li><a id="btn_maps_collectins" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_collectins") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Collections</a></li>
					<li><a id="btn_maps_deliveries" class="'; if((isset($_GET['page'])) && $_GET['page'] == "maps_deliveries") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">Deliveries</a>
					</li>
					</ul>
					</li>'


					/*CONTACTS*/
					.'<li><a style="'; if((isset($_GET['page'])) && ($_GET['page'] == "contacts_list" || $_GET['page'] == "maps_deliveries") || $_GET['page'] == "contacts_add_new" ) { echo "background-color: #0e024e;"; } echo '" id="submenu_li_veh" class="menu_button disable-select">Contacts<img id="drop_down_icon" src="images/icons/caret-down.png" alt="Menu" title="Menu" /></a>
					<ul id="submenu">
					<li><a id="btn_contacts_list" class="'; if((isset($_GET['page'])) && $_GET['page'] == "contacts_list") {echo "active";}; echo ' menu_button disable-select submenu_veh" onClick="javascript:setIframeUrl(this.id)">List</a></li>
					</ul>
					</li>'

					/*ABOUT*/
					.'<li><a id="btn_about" class="'; if((isset($_GET['page'])) && $_GET['page'] == "about") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >About</a>
					</li>
					</ul>
					</nav>
					</div>
					';
					break;



					case 'shunter':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*YARD*/
					.'<li><a id="btn_bays" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "bays")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Bays</a>
					</li>'

					/*SERVICE*/	
					.'<li><a id="btn_service" class="'; if((isset($_GET['page'])) && $_GET['page'] == "service") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >Service</a>
					</li>'
					/*VOR*/
					.'<li><a id="btn_vor" class="'; if((isset($_GET['page'])) && $_GET['page'] == "vor") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >VOR</a>
					</li>'
					/*EMPTY*/
					.'<li><a id="btn_empty" class="'; if((isset($_GET['page'])) && $_GET['page'] == "empty") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >Empty</a>
					</li>'
					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>
					</ul>
					</nav>
					</div>
					';
					break;


					case 'controller':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*YARD*/
					.'<li><a id="btn_bays" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "bays")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Bays</a>
					</li>'
					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>

					</ul>
					</nav>
					</div>
					';
					break;



					case 'goods-in-clerk':
					echo '
					<div id="sied_bar_div">
					<nav id="navigation">
					<ul id="mainmenu">
					'
					/*YARD*/
					.'<li><a id="btn_bays" class="'; if((!isset($_GET['page'])) || ($_GET['page'] == "bays")) {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)">Bays</a>
					</li>'
					/*NEWS*/	
					.'<li><a id="btn_news" class="'; if((isset($_GET['page'])) && $_GET['page'] == "news") {echo "active";}; echo ' menu_button disable-select" onClick="javascript:setIframeUrl(this.id)" >News</a>
					</li>

					</ul>
					</nav>
					</div>
					';
					break;

					default:
					/*code...*/
					break;
				}
			}
			?>

			<!-- MAIN CONTENT -->
			<div id="main_content_div">
				<?php 
				echo '
				<iframe id="iframe-id" class="iframe_main_page" src="pages/index_iframe.php?page='; 
				if(isset($_GET['page'])) { 
					if (isset($_GET['vehicle_id'])) {
						echo $_GET['page'].'&vehicle_id='.$_GET['vehicle_id'];
					} else if(isset($_GET['emp_id'])) {
						echo $_GET['page'].'&emp_id='.$_GET['emp_id'];
					} else {
						echo $_GET['page']; 
					}
				} else if(isset($_SESSION['u_type']) && (($_SESSION['u_type'] == 'shunter') || ($_SESSION['u_type'] == 'controller')) ) { 
					echo "bays";
				} else {
					echo "home";
				};
				echo '" seamless="0" frameborder="0" onload="isSessionLive()" scrolling="auto" ></iframe>
				';
				?>
			</div>
		</div>

		<!-- SHADOW FOR SIDE MENU ON MIBILE VERSION -->
		<div id="main_div_shader" ><a style="outline: 0;" href="javascript:hideNavBar()"></a></div>

	</div>


	<div class="orientation_msg"></div>
</body>




</html>