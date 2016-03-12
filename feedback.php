<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Feedback | Training Lab</title>
  <meta name="description" content="This is a user page">
  <meta name="keywords" content="user">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">

</head>
<body>
<?php session_start();
if (!isset($_SESSION['username'])) {
	header('Location: index.php#loginSub');
}
	if($_GET){
		//查询
		require_once 'DAO.php';
		$db=new DB();
		$data['fb_id'] = $_GET['feedbackid'];
		$judge['fb_id'] = '=';
		list($conSql, $mapConData) = $db->FDFields($data,"", $judge);
		$mData = $db->fetch('select * from tb_feedbacks where ' . $conSql, $mapConData);
		 
		//var_dump($mData);
	}else{
		header('Location: index.php#loginSub');
	}

 ?>

<div class="am-g">
	<div class="am-u-sm-12" style="text-align:center;font-size:35px;"><?php print($mData['fb_name']); ?></div>
	<div class="am-u-sm-6" style="text-align:center;color:red;"><?php print("End Time:".date('m-d H:i',strtotime($mData['fb_end']))); ?></div>
	
</div>
<div class="am-g">
	<div class='am-u-sm-10 am-u-sm-end am-u-sm-offset-1'><?php print($mData['fb_des'])?></div>
</div>

<form action="submitfeedback.php" method="post" class="am-form">
<!-- <div class='am-g'>
		<div class='am-u-sm-3'>
		<div class='am-form-group'>
			<label for='doc-select-1' class='am-u-sm-5 am-form-label'>Select Batch:</label>
			<div class='am-u-sm-7'>
		      <select id='doc-select-1'>

		        <option value='option1'>Open source</option>
		        <option value='option2'>.Net class1</option>
		        <option value='option2'>.Net class2</option>
		        <option value='option2'>Java class1</option>
		        <option value='option2'>Java class2</option>
		      </select>
		      <span class='am-form-caret'></span>
		      </div>
		    </div>
		</div>
		</div> -->
<?php 
	if($mData['fb_askgroup']=='1'){
		$askgroup="
		
		<div class='am-form-group am-form-success am-form-icon am-form-feedback'>
		    <label for='doc-ipt-3-a' style='text-align:right;' class='am-u-sm-2 am-form-label am-u-sm-offset-1'>Select Batch:</label>
		    <div class='am-u-sm-8 am-u-end'>
		      <select id='doc-select-1' name='group'>

		        <option value='Open source'>Open source</option>
		        <option value='.Net class1'>.Net class1</option>
		        <option value='.Net class2'>.Net class2</option>
		        <option value='Java class1'>Java class1</option>
		        <option value='Java class2'>Java class2</option>
		      </select>
		      <span class='am-form-caret'></span>
		    </div>
		  </div>
		  <br>
		  <br>
		";
		print($askgroup);
	}
 ?>
 <hr>
	<div class='am-g'>
		<div class='am-u-sm-10 am-u-end am-u-sm-offset-1'>
		<?php 
			$profbData = $db->fetchAll('select pro_id from tb_fb_pro where ' . $conSql, $mapConData);
			//var_dump($profbData);
			print("<ol>");
			foreach ($profbData as $k => $va) {
				foreach ($va as $key => $v1) {
					$data1['pro_id'] = $v1;
					$judge1['pro_id'] = '=';
					list($conSql1, $mapConData1) = $db->FDFields($data1,"", $judge1);
					$problemData = $db->fetch('select * from tb_problems where ' . $conSql1, $mapConData1);
					print("<li>");
					print($problemData["pro_des"]);
					//var_dump($problemData);
					print("</li>");
					$proname="problem".$problemData["pro_id"];
					$out="";
					if($problemData["pro_type"]!='3'){
						$ansData = $db->fetchALL('select ans,ans_id from tb_ans where ' . $conSql1, $mapConData1);
						//var_dump($ansData);
						foreach ($ansData as $ansarraykey => $ansarray) {

							if($problemData["pro_type"]=='1'){$type="radio";}
							else $type="checkbox";
							$out.="
									<div class='am-".$type."'>
									      <label>
									        <input ".($type=='radio'?"required":"")." type='".$type."' name='".$proname."' value='".$ansarray['ans_id']."'>
									        ".$ansarray['ans']."
									      </label>
									    </div>
								";
						}
					}else{
						$out="
							<div class='am-form-group'>
							    <textarea  placeholder='Enter your answer here!'  rows='3'"." name='".$proname."'></textarea>
							</div>
						";
						
					}
					print($out);
				}
			}
			print("</ul>");
		 ?>
		 </div>
	</div>
	<div class="am-from-group">
  <div class="am-u-sm-10 am-u-end am-u-sm-offset-1">
  <?php $fb_id=$_GET['feedbackid']; ?>
  	<input type="hidden" name='fb_id' value='<?php print($fb_id); ?>'>
  	<button type="submit" class="am-btn am-btn-block ">Submit</button>
  	</div>
  </div>
</form>
<br>
<br>
<br>
<footer>
  <hr>
  <p class="am-padding-left">© 2015 Training Lab, Inc. Licensed under MIT license.</p>
</footer>
    <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="assets/js/jquery.min.js"></script>
  <!--<![endif]-->
  <script src="assets/js/amazeui.min.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>
 