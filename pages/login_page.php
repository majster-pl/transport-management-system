<?php 

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




?>

