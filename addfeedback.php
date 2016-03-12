<?php 
  session_start();
  if($_POST){
    $postnum=count($_POST);
    
    if($postnum<=2){
      $msg="No problem here!";
    }else{
    require_once 'DAO.php';
    $db=new DB();
    $inData['fb_name'] = $_POST['name'];
    $inData['fb_des'] = $_POST['des'];
    $inData['fb_begin'] = $_POST['begintime'];
    $inData['fb_end'] = $_POST['endtime'];
    $inData['fb_create_user'] = $_SESSION['username'];
    $inData['fb_create_time'] = date('Y-m-d H:i:s',time());
	$inData['fb_askgroup'] = $_POST['askgroup'];
	print($_POST['askgroup']);
    $ret = $db->insert('tb_feedbacks', $inData,true);
    if($ret)$msg="Add feedback success! Let us add more!";
    else $msg="Add feedback Failure!";
    $flag=0;
    if($ret){
      $ans=array_slice($_POST,5);
      //print_r($ans);
      $ansData['fb_id']=$ret;
      foreach ($ans as $key => $value) {
        $ansData['pro_id']=$value;
        if(!$db->insert('tb_fb_pro', $ansData)){$msg="Add feedback Failure!";$flag=1;break;}
      }
    }else{
    	$flag=1;
    	$msg="Add feedback failure!";
    }
    if($flag){
    	$delVal = $ret;
    	list($delCon, $mapDelCon) = $db->FDField('fb_id', $delVal);
    	$delRet = $db->delete('tb_fb_pro', $delCon, $mapDelCon);
    	$s=$db->delete('tb_feedbacks', $delCon, $mapDelCon);
    	if($s&&$delRet)$msg.="delete success!";
    	else $msg.="delete failure!";
    }
  }
  }
  print($msg);
?>