<?php 
  session_start();
  if (isset($_SESSION['username'])) {
    header('Location: user.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Training Lab | Home Page</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>

  <style>

    .get-title {
      font-size: 200%;
      border: 2px solid #fff;
      padding: 20px;
      display: inline-block;
    }

    .get-btn {
      background: #fff;
    }

    .detail {
      background: #fff;
    }

    .detail-h2 {
      text-align: center;
      font-size: 150%;
      margin: 40px 0;
    }

    .detail-h3 {
      color: #1f8dd6;
    }

    .detail-p {
      color: #7f8c8d;
    }

    .detail-mb {
      margin-bottom: 30px;
    }

    .hope {
      background: #0bb59b;
      padding: 50px 0;
    }

    .hope-img {
      text-align: center;
    }

    .hope-hr {
      border-color: #149C88;
    }

    .hope-title {
      font-size: 140%;
    }

    .about {
      background: #fff;
      padding: 40px 0;
      color: #7f8c8d;
    }

    .about-color {
      color: #34495e;
    }

    .about-title {
      font-size: 180%;
      padding: 30px 0 50px 0;
      text-align: center;
    }

    .footer p {
      color: #7f8c8d;
      margin: 0;
      padding: 15px 0;
      text-align: center;
      background: #2d3e50;
    }
    .silder-img{
      height: 350px;
    }
  </style>
</head>
<body>
<?php
if ($_SESSION) {
	if (isset($_SESSION['error'])) {
		$pr = $_SESSION['error'];
		print("<script>alert('$pr')</script>");
		session_unset();
		session_destroy();
	}
}

?>

<header class="am-topbar am-topbar-fixed-top">
  <div class="am-container">
    <h1 class="am-topbar-brand">
      <a href="#">Training Lab</a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
            data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
        class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li class="am-active"><a href="#">Home</a></li>
       <!--  <li><a href="#">Feedback</a></li>
        <li class="am-dropdown" data-am-dropdown>
          <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
            下拉菜单 <span class="am-icon-caret-down"></span>
          </a>
          <ul class="am-dropdown-content">
            <li class="am-dropdown-header">标题</li>
            <li><a href="#">1. 默认样式</a></li>
            <li><a href="#">2. 基础设置</a></li>
            <li><a href="#">3. 文字排版</a></li>
            <li><a href="#">4. 网格系统</a></li>
          </ul>
        </li> -->
      </ul>

      <div class="am-topbar-right">
        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" onclick="location.href='sign.php'"><span class="am-icon-pencil"></span> Sign up</button>
      </div>

      <div class="am-topbar-right">
        <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm" onclick="location.hash='#loginSub'"><span class="am-icon-user"></span> Login</button>
      </div>
    </div>
  </div>
</header>
    <div class="am-slider am-slider-default" data-am-flexslider id="slider">
      <ul class="am-slides">
        <li><img class="silder-img" src="img/1.jpg" alt="Image Can't be load!"></li>
        <li><img class="silder-img" src="img/1.jpg" alt="Image Can't be load!"></li>
      </ul>
    </div>
<div class="detail">
  <div class="am-g am-g-fixed">
    <div class="am-u-lg-12">
      <h2 class="detail-h2">Training and Getting</h2>

      <div class="am-g">
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">

          <h3 class="detail-h3">
            <i class="am-icon-mobile am-icon-sm"></i>
            PHP
          </h3>

          <p class="detail-p">
            PHP is a popular general-purpose scripting language that is especially suited to web development.
Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            <i class="am-icon-cogs am-icon-sm"></i>
            Big Date
          </h3>

          <p class="detail-p">
            Big data is a broad term for data sets so large or complex that traditional data processing applications are inadequate.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            <i class="am-icon-check-square-o am-icon-sm"></i>
            Data analysis
          </h3>

          <p class="detail-p">
            Analysis of data is a process of inspecting, cleaning, transforming, and modeling data with the goal of discovering useful information, suggesting conclusions, and supporting decision-making.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            <i class="am-icon-send-o am-icon-sm"></i>
            MySQL
          </h3>

          <p class="detail-p">
            MySQL is a popular choice of database for use in web applications, and is a central component of the widely used LAMP open source web application software stack (and other "AMP" stacks).
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="hope">
  <div class="am-g am-container">
    <div class="am-u-lg-4 am-u-md-6 am-u-sm-12 hope-img">
      <img src="assets/i/examples/landing.png" alt="" data-am-scrollspy="{animation:'slide-left', repeat: false}">
      <hr class="am-article-divider am-show-sm-only hope-hr">
    </div>
    <div class="am-u-lg-8 am-u-md-6 am-u-sm-12">
      <h2 class="hope-title">Training Lab</h2>

      <p>
        Training Lab is an upcoming training company in Shandong that provide training for latest IT technology such as Big Data, Data Analytics, MySQL, PHP in to English and Chines Language.
      </p>
    </div>
  </div>
</div>

<div class="about">
  <div class="am-g am-container">
    <div class="am-u-lg-12">
      <h2 class="about-title about-color">Login</h2>

      <div class="am-g">
        <div class="am-u-lg-6 am-u-md-4 am-u-sm-12">
          <form class="am-form"id="loginfrom" action="user.php" method="post">
            <label for="name" class="about-color">Login Id</label>
            <input id="name" name='userid' type="text">
            <br/>
            <label for="password" class="about-color">Possword</label>
            <input id="password"name='password' type="password">
            <br/>
<!--             <label for="message" class="about-color">你的留言</label>
            <textarea id="message"></textarea>
            <br/> -->
            <button type="submit" class="am-btn am-btn-primary am-btn-sm" id='loginSub'><i class="am-icon-check"></i> Login</button>
          </form>
          <hr class="am-article-divider am-show-sm-only">
        </div>

        <div class="am-u-lg-6 am-u-md-8 am-u-sm-12">
          <h4 class="about-color">About us</h4>

          <p>Training Lab Inc
            Training Lab is an upcoming training company in Shandong that provide training for latest IT technology such as Big Data, Data Analytics, MySQL, PHP in to English and Chines Language.</p>
          <h4 class="about-color">Team</h4>

          <p>Training Lab Inc. We have many excellent engineers and student interns, teachers currently have more than 20 senior titles, and our team is very good.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer">
  <p>© 2015 <a href="https://www.Dodd2014.com/niit/" target="_blank">Training Lab, Inc.</a> Licensed under <a
      href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a>. by the Training Lab Team.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
</body>
</html>
