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
					<img id="menu_icon" src="images/icons/menu-white.png" alt="Menu" title="Menu" />
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
			if(isset($_SESSION['u_id_disable'])) {
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
			// only show menu when user logged in
			if (isset($_SESSION['u_id'])) {
				echo '
				<nav id="navigation_menu">
				<ul class="mainmenu_ul">
				<li><a id="btn_home" class="menu_button disable-select">Home</a>
				</li>
				</ul>
				</nav>
				';
			}
			?>

			<!-- MAIN CONTENT -->
			<div id="content_iframe_div">
				<iframe id="iframe-id" class="iframe_main_page" src="pages/index_iframe.php?page=home" seamless="0" frameborder="0" scrolling="auto">
				</iframe>
			</div>
		</div>

		<!-- SHADOW FOR SIDE MENU ON MIBILE VERSION -->
		<div id="main_div_shader" ><a style="outline: 0;" href="javascript:hideNavBar()"></a></div>

		<div class="footer_div">
			<p>Copyright &copy 2018 Szymon Waliczek</p>
		</div>
	</div>

	<div class="orientation_msg"></div>
</body>


</html>