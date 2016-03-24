<?php 
  session_start();
  if($_POST){
    require_once 'DAO.php';
    $db=new DB();
    $inData['sem_begintime'] = $_POST['begintime'];
    $inData['sem_endtime'] = $_POST['endtime'];
    $inData['sem_name'] = $_POST['name'];
    $ret = $db->insert('tb_semester', $inData,true);
    if($ret)$msg="Add semester success!";
    else $msg="Add semester Failure!";
    
  }
  print($msg);
?>