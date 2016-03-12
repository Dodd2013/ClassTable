<?php 
  session_start();
  if($_POST){
    $postnum=count($_POST);
    
    if($_POST['types']!='3'&&$postnum<=2){
      $msg="No answer here!";
    }else{
    require_once 'DAO.php';
    $db=new DB();
    $inData['pro_des'] = $_POST['des'];
    $inData['pro_type'] = $_POST['types'];
    $inData['pro_create_user'] = $_SESSION['username'];
    $inData['pro_create_time'] = date('Y-m-d H:i:s',time());
    $ret = $db->insert('tb_problems', $inData,true);
    if($ret)$msg="Add problem success! Let us add more!";
    else $msg="Add problem Failure!";
    if($_POST['types']!='3'&&$ret){
      $ans=array_slice($_POST,2);
      //print_r($ans);
      $ansData['pro_id']=$ret;
      foreach ($ans as $key => $value) {
        $ansData['ans']=$value;
        if(!$db->insert('tb_ans', $ansData))die("can't!");
      }
    }
  }
  }
  print($msg);
?>