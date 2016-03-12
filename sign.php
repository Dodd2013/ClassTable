<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Training Lab | SignUp Page</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>Sign Up</h1>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
<!--     <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
    </div> -->
    <br>
    <br>
    <?php 
  if($_POST){
    $userid=$_POST["userid"];
    $ans="";
    $divwamp="<div class='am-alert am-alert-danger' id='dangerid1' style=\"margin-top:0.2em;margin-bottom:0.2em;padding:0.325em\" data-am-alert>
  <button type='button' class='am-close'>&times;</button>";
      $s1="";
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
      $ans.=str_replace("id1","id1",$divwamp)."<p>E-mail is not valid</p></div>";
      $s1.="$('#dangerid1').alert();";
    }
    if(strlen($userid)<4||strlen($userid)>16){
      $ans.=str_replace("id2","id1",$divwamp)."<p>UserId is not valid</p></div>";
      $s1.="$('#dangerid2').alert();";
    }
    if(strlen($_POST["password"])<4||strlen($_POST["password"])>16){
      $ans.=str_replace("id3","id1",$divwamp)."<p>PassWord is not valid</p></div>";
      $s1.="$('#dangerid3').alert();";
    }
    if(strlen($ans)>0){
      
    }else{
      $pwd=$_POST["password"];
      $email=$_POST["email"];
      require_once 'DAO.php';
      $db=new DB();
      $inData['user_id'] =$userid;
      $inData['user_pwd'] = $pwd;
      $inData['user_email'] = $email;
      $inData['user_regdate'] = date('Y-m-d H:i:s',time());
      $ret = $db->insert('tb_users', $inData);
      //echo '插入' . ($ret ? '成功' : '失败') . '<br/>';
      if($ret){
        $ans.="<div class='am-alert am-alert-success' id='dangerid5' style=\"margin-top:0.2em;margin-bottom:0.2em;padding:0.325em\" data-am-alert>
  <button type='button' class='am-close'>&times;</button><a class='am-btn-link' style='color:blue;' href='index.php#loginSub'>You sign succeed! Click here to login!</a></div>";
      }else{
        $ans.="<div class='am-alert am-alert-danger' id='dangerid5' style=\"margin-top:0.2em;margin-bottom:0.2em;padding:0.325em\" data-am-alert>
  <button type='button' class='am-close'>&times;</button><p>User Id exist!</p></div>";
      }
    }
    print($ans."<script>".$s1."</script>");
  }
  ?>
    <form method="post" class="am-form" action="sign.php">
      <label for="userid">UserId:</label>
      <input type="text" name="userid" id="userid" value="">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
      <?php 
        $pr="<label for='emailcode'>Security Code:</label>
        <input type='number' name='emailcode' id='emailcode' value=''>
        <button>";
        require ("config.php");
        if($EMAIL_SIGN)print($pr);
      ?>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="Sign Up" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>
    <hr>
    <p>© 2015 Training Lab, Inc. Licensed under <a
      href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</p>
  </div>
</div>
</body>
</html>