<?php 
if($_SESSION){
	
  if($_SESSION['identity']==''){require_once('include/sidebar_stu.php');}
  if($_SESSION['identity']=='teacher')require_once("include/sidebar_tea.php");
  if($_SESSION['identity']=='hr')require_once("include/sidebar_hr.php");
  if($_SESSION['identity']=='admin')require_once("include/sidebar_admin.php");
}else{
  header('Location: index.php#loginSub');
}

 ?>