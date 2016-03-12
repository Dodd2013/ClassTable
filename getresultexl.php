
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

<?php //print($mData['fb_name']); ?>
<?php //print("End Time:".date('m-d H:i',strtotime($mData['fb_end']))); ?>
	
<?php //print($mData['fb_des'])?>

<?php 
	$abc = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$batch="All Batch";
	if($mData['fb_askgroup']=='1'){
		if(isset($_GET['group']))$batch=$_GET['group'];
		$askgroup="
		
		<div class='am-form-group am-form-success am-form-icon am-form-feedback' data-am-sticky>
		    <label for='doc-ipt-3-a' style='text-align:right; font-size:30px;' class='am-u-sm-3 am-form-label am-u-sm-offset-9'>".$batch."</label>
		  </div>
		  <br>
		  <br>
		";
		//print($askgroup);
	}
	include 'PHPExcelClass/PHPExcel.php';
	include 'PHPExcelClass/PHPExcel/Writer/Excel5.php';
	//或者include 'PHPExcel/Writer/Excel5.php'; 用于输出.xls的
	//创建一个excel
	$objPHPExcel = new PHPExcel();

	// ——————————————————————————————————————–
	// 设置excel的属性：
	// 创建人
	$objPHPExcel->getProperties()->setCreator("Dodd");
	// 最后修改人
	$objPHPExcel->getProperties()->setLastModifiedBy("Dodd");
	// 标题
	$objPHPExcel->getProperties()->setTitle("Feedbacks Result");
	// 题目
	$objPHPExcel->getProperties()->setSubject($mData['fb_name']);
	// 描述
	$objPHPExcel->getProperties()->setDescription($mData['fb_des']);
	// 关键字
	$objPHPExcel->getProperties()->setKeywords("Feedbacks Result");
	// 种类
	$objPHPExcel->getProperties()->setCategory("Feedbacks Result");
	//——————————————————————————————————————–
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle($batch);//
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(100);
 ?>
		<?php 
			$profbData = $db->fetchAll('select pro_id from tb_fb_pro where ' . $conSql, $mapConData);
			$problemnum=0;

			//print("<ol>");
			foreach ($profbData as $k => $va) {
				$problemnum++;
				foreach ($va as $key => $v1) {
					$data1['pro_id'] = $v1;
					$judge1['pro_id'] = '=';
					list($conSql1, $mapConData1) = $db->FDFields($data1,"", $judge1);
					$problemData = $db->fetch('select * from tb_problems where ' . $conSql1, $mapConData1);
					//print("<li>");
					//print($problemData["pro_des"]);
					$objPHPExcel->getActiveSheet()->mergeCells('A'.($problemnum*2-1).':A'.($problemnum*2));
					$objPHPExcel->getActiveSheet()->getStyle('A'.($problemnum*2-1))->getAlignment()->setWrapText(true);
					$objPHPExcel->getActiveSheet()->getRowDimension(($problemnum*2-1))->setRowHeight(-1);
					$objPHPExcel->getActiveSheet()->setCellValue('A'.($problemnum*2-1),str_replace("<BR>","",$problemData["pro_des"]));
					//print("</li>");
					$ansnum=0;
					$proname="problem".$problemData["pro_id"];
					$out="";
					$out1="";
					if($problemData["pro_type"]!='3'){
						$ansData = $db->fetchALL('select ans,ans_id from tb_ans where ' . $conSql1, $mapConData1);
					
						foreach ($ansData as $ansarraykey => $ansarray) {
							$ansnum++;
							$objPHPExcel->getActiveSheet()->getColumnDimension($abc[$ansnum])->setWidth(strlen(trim($ansarray['ans']))*1);
							$objPHPExcel->getActiveSheet()->setCellValue($abc[$ansnum].($problemnum*2-1),trim($ansarray['ans']));
							//查询这个ansid的有多少人选了
							if(isset($_GET['group']))$sql="select count(*) as a from tb_sub_detail where sub_id in (select sub_id from tb_submit where fb_id='".$_GET['fb_id']."' and groups ='".$_GET['group']."') and ans_id='".$ansarray['ans_id']."' ";
							else
								$sql="select count(*) as a from tb_sub_detail where sub_id in (select sub_id from tb_submit where fb_id='".$_GET['fb_id']."') and ans_id='".$ansarray['ans_id']."' ";
							$anscount = $db->fetch($sql);
							$objPHPExcel->getActiveSheet()->setCellValue($abc[$ansnum].($problemnum*2),trim($anscount['a']));
						}
						$out=str_replace(" ","",$out);
						//print("<div style='padding:10px 80px 10px 50px;' id='display".$problemData['pro_id']."'></div>");
						$scrip="<script>display(\"#display".$problemData['pro_id']."\",\"".$out."\",\"".$out1."\")</script>";
						//print($scrip);
					}else{
						$out="
							<div class='am-form-group'>
							    <textarea  placeholder='Enter your answer here!'  rows='3'"." name='".$proname."'></textarea>
							</div>
						";
						
					}
				
				}
			}
			//print("</ul>");
?>
<?php 
	

	// $objPHPExcel->getActiveSheet()->setCellValue('A1', 'String');
	// $objPHPExcel->getActiveSheet()->setCellValue('A2', 12);
	// $objPHPExcel->getActiveSheet()->setCellValue('A3', true);
	// $objPHPExcel->getActiveSheet()->setCellValue('C5', 'fdsaf');
	// $objPHPExcel->getActiveSheet()->setCellValue('B8', 'fdsafdsa');
	// 保存excel—2007格式
	// $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	// //或者$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel); 非2007格式
	// $objWriter->save("xxx.xlsx");
	//直接输出到浏览器
	$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
	ob_end_clean();
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
	header("Content-Type:application/force-download");
	header("Content-Type:application/vnd.ms-execl");
	header("Content-Type:application/octet-stream");
	header("Content-Type:application/download");;
	header('Content-Disposition:attachment;filename="xxxx.xls"');
	header("Content-Transfer-Encoding:binary");
	$objWriter->save('php://output');
 ?>

 