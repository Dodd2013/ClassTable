<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>submit</title>
</head>
<body>
	<?php 
if($_POST){
	session_start();
	require_once 'DAO.php';
	$db=new DB();
	$data1['fb_id'] = $_POST['fb_id'];
	$judge1['fb_id'] = '=';
	$data1['user_id'] = $_SESSION['username'];
	$judge1['user_id'] = '=';
	list($conSql1, $mapConData1) = $db->FDFields($data1, 'and', $judge1);
	$have = $db->fetch('select count(*) as a from tb_submit where ' . $conSql1 , $mapConData1);
	if($have['a']=='0'){
	$inData['user_id'] = $_SESSION['username'];
	$inData['sub_time'] = date('Y-m-d H:i:s',time());
	$inData['fb_id'] = $_POST['fb_id'];
	if(isset($_POST['group'])){
		$inData['groups'] = $_POST['group'];
	}else{
		$inData['groups'] = "null";
	}
	$ret = $db->insert('tb_submit', $inData,true);
	if($ret)print("submit suessed!");
	//var_dump($_POST);
	foreach ($_POST as $key => $value) {
		$subData['sub_id'] = $ret;
		if(substr($key,0,7)=='problem'){
			//var_dump(substr($key,7)."ans".$value);

			$subData['pro_id'] = substr($key,7);
			$data['pro_id'] = substr($key,7);
			$judge['pro_id'] = '=';
			list($conSql, $mapConData) = $db->FDFields($data, 'and', $judge);
			$mData = $db->fetch('select pro_type from tb_problems where ' . $conSql , $mapConData);
			//var_dump($mData);
			if($mData['pro_type']=='3')
				$subData['ans'] = $value;
			else
				$subData['ans_id'] = $value;

			$suss=$db->insert('tb_sub_detail', $subData);
			unset($subData['ans_id']);
			unset($subData['ans']);
			if($suss)print("problem suessed!");
			else print("Not yet!");
		}
	}
}else{
	print("You have submit this feedback yet!");
}
}
?>
<script type="text/javascript">
setTimeout("self.close()",5000);
</script>
</body>
</html>
