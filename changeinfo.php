<?php session_start();
$_msg = "";
if (!isset($_SESSION['username'])) {
	header('Location: index.php#loginSub');
}
if ($_POST) {
	require_once "config.php";
	//print_r($_POST);
	//print_r($_FILES);
	$h = "";
	$username = $_SESSION['username'];
	$con = mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME);
	if ($_FILES["user-pic"]['name'] != '') {
		if ($_FILES["user-pic"]["type"] == "image/gif") {
			$h = ".gif";
		}

		if ($_FILES["user-pic"]["type"] == "image/jpeg") {
			$h = ".jpg";
		}

		if ($_FILES["user-pic"]["type"] == "image/pjpeg") {
			$h = ".png";
		}

		$picname = date("Y_m_d_h_i_s") . $_SESSION['username'] . $h;
		if ((($_FILES["user-pic"]["type"] == "image/gif")
			|| ($_FILES["user-pic"]["type"] == "image/jpeg")
			|| ($_FILES["user-pic"]["type"] == "image/pjpeg")
			|| ($_FILES["user-pic"]["type"] == "image/png"))
			&& ($_FILES["user-pic"]["size"] < 100000)) {
			if ($_FILES["user-pic"]["error"] > 0) {
				$_msg .= "Return Code: " . $_FILES["user-pic"]["error"] . "<br />";
			} else {
				if (file_exists("userdata/img/" . $picname)) {
					$_msg .= $picname . " already exists. ";
				} else {
					move_uploaded_file($_FILES["user-pic"]["tmp_name"],
						"userdata/img/" . $picname);
					//$_msg.= "Stored in: " . "userdata/img/" . $picname;
					$sql = "update tb_users set user_img='$picname' where user_id='$username';";
					//print($sql);
					if (mysql_query($sql)) {
						$_msg .= "change img succeed!\\n";
					}

					$_SESSION['img'] = $picname;
				}
			}
		} else {
			$_msg .= "Invalid file\\n";
		}
		if ($_FILES["user-pic"]["error"] > 0) {
			$_msg .= "Error: " . $_FILES["user-pic"]["error"] . "\\n";
		}
	}
	if ($_POST['oldpwd'] != '') {
		$res = mysql_query("select * from tb_users where user_id='$username'");
		$row = false;
		if (is_resource($res)) {
			$row = mysql_fetch_array($res);
		}
		//if($row&&$row['pwd']==$password){
		$oldpwd = $_POST['oldpwd'];
		$newpwd = $_POST['newpwd'];
		$confimpwd = $_POST['confimpwd'];
		if ($newpwd != $confimpwd) {
			$_msg .= "Confim Password is not right!\\n";
		} else if ($oldpwd != $row['user_pwd']) {
			$_msg .= "Old Password is not right!\\n";
		} else if (strlen($newpwd) < 6) {
			$_msg .= "New Password is not long then 6 chars!\\n";
		} else {
			$sql = "update tb_users set user_pwd='$newpwd' where user_id='$username';";
			if (mysql_query($sql)) {
				$_msg .= "change password succeed!\\n";
			}

		}
	}
}
print($_msg);
?>