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
	    <!--[if (gte IE 9)|!(IE)]><!-->
	  <script src="assets/js/jquery.min.js"></script>
	  <!--<![endif]-->
	  <script src="assets/js/amazeui.min.js"></script>
	  <script src="assets/js/app.js"></script>
	  <script src='js/highcharts.js'></script>
	 <script type="text/javascript">
			function parseArrayInt(data){
				var dat=new Array();
				for (var i = data.length - 1; i >= 0; i--) {
					dat[i]=parseInt(data[i]);
				};
				return dat;
			}
			 function display(div,categoriesstr,datastr) {
			 	var categorie=categoriesstr.split(',');
			 	var dat=parseArrayInt(datastr.split(','));

			    $(div).highcharts({
			        chart: {
			            type: 'column'
			        },
			        title: {
			            text: ''
			        },
			        xAxis: {
			            categories: categorie
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'The Number of People'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.0f} People</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            }
			        },
			        credits: {
			                  enabled:false
			        },
			        series: [{
			            name: 'Problem',
			            data: dat

			        }]
			    });
			}
		</script>
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
		$data['fb_id'] = $_GET['fb_id'];
		$judge['fb_id'] = '=';
		list($conSql, $mapConData) = $db->FDFields($data,"", $judge);
		$mData = $db->fetch('select * from tb_feedbacks where ' . $conSql, $mapConData);
		 
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
<?php 
	if($mData['fb_askgroup']=='1'){
		if(isset($_GET['group']))$batch=$_GET['group'];
		else $batch="All Batch";
		$askgroup="
		
		<div class='am-form-group am-form-success am-form-icon am-form-feedback' data-am-sticky>
		    <label for='doc-ipt-3-a' style='text-align:right; font-size:30px;' class='am-u-sm-3 am-form-label am-u-sm-offset-9'>".$batch."</label>
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
			
			print("<ol>");
			foreach ($profbData as $k => $va) {
				foreach ($va as $key => $v1) {
					$data1['pro_id'] = $v1;
					$judge1['pro_id'] = '=';
					list($conSql1, $mapConData1) = $db->FDFields($data1,"", $judge1);
					$problemData = $db->fetch('select * from tb_problems where ' . $conSql1, $mapConData1);
					print("<li>");
					print($problemData["pro_des"]);
					
					print("</li>");
					$proname="problem".$problemData["pro_id"];
					$out="";
					$out1="";
					if($problemData["pro_type"]!='3'){
						$ansData = $db->fetchALL('select ans,ans_id from tb_ans where ' . $conSql1, $mapConData1);
					
						foreach ($ansData as $ansarraykey => $ansarray) {

							if($problemData["pro_type"]=='1'){$type="radio";}
							else $type="checkbox";
							if($out=='')
								$out.="'".$ansarray['ans']."'";
							else
								$out.=",'".$ansarray['ans']."'";
							//查询这个ansid的有多少人选了
							if(isset($_GET['group']))$sql="select count(*) as a from tb_sub_detail where sub_id in (select sub_id from tb_submit where fb_id='".$_GET['fb_id']."' and groups ='".$_GET['group']."') and ans_id='".$ansarray['ans_id']."' ";
							else
								$sql="select count(*) as a from tb_sub_detail where sub_id in (select sub_id from tb_submit where fb_id='".$_GET['fb_id']."') and ans_id='".$ansarray['ans_id']."' ";
							$anscount = $db->fetch($sql);
							if($out1=='')
								$out1.=$anscount['a'];
							else
								$out1.=",".$anscount['a'];
						}
						$out=str_replace(" ","",$out);
						print("<div style='padding:10px 80px 10px 50px;' id='display".$problemData['pro_id']."'></div>");
						$scrip="<script>display(\"#display".$problemData['pro_id']."\",\"".$out."\",\"".$out1."\")</script>";
						print($scrip);
					}else{
						$out="
							<div class='am-form-group'>
							    <textarea  placeholder='Enter your answer here!'  rows='3'"." name='".$proname."'></textarea>
							</div>
						";
						
					}
				
				}
			}
			print("</ul>");
		 ?>
		 </div>
	</div>
	<div  class="am-from-group">
  <div class="am-u-sm-10 am-u-end am-u-sm-offset-1">
  <?php $fb_id=$_GET['fb_id']; ?>
  	</div>
  </div>
<br>
<br>
<br>
<footer>
  <hr>
  <p class="am-padding-left">© 2015 Training Lab, Inc. Licensed under MIT license.</p>
</footer>
  
</body>
</html>
 