<script type="text/javascript">
	function loadPage(url) {
		top.location.href = '../index.php?page='+url;
	}
</script>

<?php
session_start();
date_default_timezone_set('Europe/London');

// function to set header on main page
function loadPagePHP($url_) {
	echo "<script language=javascript>";
	echo 'loadPage("'.$url_.'")';
	echo "</script> "; 
}

// if submit passed
if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// check if passed values not empty
	if(empty($uid) || empty($pwd)) {
		// if empty
		header("Location: ../pages/index_iframe.php?login=empty");
		exit();
	} else {
		// if not empty query from DB
		$sql = "SELECT * FROM USERS_TABLE WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		// chek if login detail matches
		if ($resultCheck < 1) {
			// NO match
			header("Location: ../pages/index_iframe.php?login=error");
			exit();
		} else {
			// match found, perform with password check
			if ($row = mysqli_fetch_assoc($result)) {
				// wrong passorw - redirect to error page
				if($row['user_pwd'] !== $pwd){
					header("Location: ../pages/index_iframe.php?login=error");
					exit();
				} else {
					// passwor correct, set session values and rediect to home page
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_firstname'] = $row['user_firstname'];
					$_SESSION['u_lastname'] = $row['user_lastname'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_privilege'] = $row['user_privilege'];
					$_SESSION['u_type'] = $row['user_type'];
					loadPagePHP('home');
					exit();
				}
			}
		}
	}

} else {
	// any other error.
	header("Location: ../pages/index_iframe.php?login=error");
	exit();
}