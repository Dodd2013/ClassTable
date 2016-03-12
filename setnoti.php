<?php 
  session_start();
  if($_POST&&$_POST["textarea"]){
    $file=fopen('Notification.txt', 'w+');
    fwrite($file, $_POST["textarea"]);
    $msg="success!";
    fclose($file);
  }
  else
    $msg="Please type words first";
  print($msg);
?>