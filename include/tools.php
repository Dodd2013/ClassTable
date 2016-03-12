<?php 
/**
  * 获取分页的HTML内容
  * @param integer $page 当前页
  * @param integer $pages 总页数
  * @param string $url 跳转url地址    最后的页数以 '?page=x' 追加在url后面
  * 
  * @return string HTML内容;
  */
 class tools{
public static function sendEmail($to,$title,$body)
  {
    ini_set("magic_quotes_runtime",0); 
    require 'PHPMailer/PHPMailerAutoload.php'; 
    try { 
      $mail = new PHPMailer(true); 
      $mail->IsSMTP(); 
      $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
      $mail->SMTPAuth = true; //开启认证 
      $mail->Port = 25; 
      $mail->Host = "smtp.sina.com"; 
      $mail->Username = "traininglab@sina.com"; 
      $mail->Password = "niit123456"; 
      //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
      $mail->AddReplyTo("Dodd@Dodd2014.com","mckee");//回复地址 
      $mail->From = "traininglab@sina.com"; 
      $mail->FromName = "www.Dodd2014.com/Training-Lab"; 
      
      $mail->AddAddress($to); 
      $mail->Subject = $title; 
      $mail->Body = $body;
      $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
      $mail->WordWrap = 80; // 设置每行字符串的长度 
      //$mail->AddAttachment("f:/test.png"); //可以添加附件 
      $mail->IsHTML(true); 
      $mail->Send(); 
      return true;
    } catch (phpmailerException $e) { 
        return false;
    } 
  }
public static function getPageHtml($page, $pages, $url){
  $pages=floor($pages);
  //最多显示多少个页码
  $_pageNum = 5;
  //当前页面小于1 则为1
  $page = $page<1?1:$page;
  //当前页大于总页数 则为总页数
  $page = $page > $pages ? $pages : $page;
  //页数小当前页 则为当前页
  $pages = $pages < $page ? $page : $pages;

  //计算开始页
  $_start = $page - floor($_pageNum/2);
  $_start = $_start<1 ? 1 : $_start;
  //计算结束页
  $_end = $page + floor($_pageNum/2);
  $_end = $_end>$pages? $pages : $_end;

  //当前显示的页码个数不够最大页码数，在进行左右调整
  $_curPageNum = $_end-$_start+1;
  //左调整
  if($_curPageNum<$_pageNum && $_start>1){  
   $_start = $_start - ($_pageNum-$_curPageNum);
   $_start = $_start<1 ? 1 : $_start;
   $_curPageNum = $_end-$_start+1;
  }
  //右边调整
  if($_curPageNum<$_pageNum && $_end<$pages){ 
   $_end = $_end + ($_pageNum-$_curPageNum);
   $_end = $_end>$pages? $pages : $_end;
  }

  $_pageHtml = '<ul class="am-pagination am-pagination-right">';
  /*if($_start == 1){
   $_pageHtml .= '<li><a title="第一页">«</a></li>';
  }else{
   $_pageHtml .= '<li><a  title="第一页" href="'.$url.'&page=1">«</a></li>';
  }*/
  if($page>1){
   $_pageHtml .= '<li><a href="'.$url.'?page='.($page-1).'">&laquo;</a></li>';
  }
  for ($i = $_start; $i <= $_end; $i++) {
   if($i == $page){
    $_pageHtml .= '<li class="am-active"><a>'.$i.'</a></li>';
   }else{
    $_pageHtml .= '<li><a href="'.$url.'?page='.$i.'">'.$i.'</a></li>';
   }
  }
  /*if($_end == $pages){
   $_pageHtml .= '<li><a title="最后一页">»</a></li>';
  }else{
   $_pageHtml .= '<li><a  title="最后一页" href="'.$url.'?page='.$pages.'">»</a></li>';
  }*/
  if($page<$_end-1){
   $_pageHtml .= '<li><a href="'.$url.'?page='.($page+1).'">&raquo;</a></li>';
  }
  $_pageHtml .= '</ul>';
  if($pages>1)
  echo $_pageHtml;
 }
}
 ?>