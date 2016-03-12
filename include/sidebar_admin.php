<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="#user-index.php"><span class="am-icon-home"></span> Home</a></li>
        <li class="admin-parent">
          <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> Feedback <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav">
            <li><a href="#newproblem.php" class="am-cf"><span class="am-icon-check"></span> New Feedbcak Problem</span></a></li>
            <li><a href="#feedback_problemlist.php"><span class="am-icon-puzzle-piece"></span> Feedbcak Problem List</a></li>
            <li><a href="#newfeedback.php"><span class="am-icon-pencil-square-o"></span> New Feedbacks</a></li>
            <li><a href="#feedbacklist.php"><span class="am-icon-th"></span> Feedback List<!-- <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span> --></a></li>
            <li><a href="#feedbacklistresult.php"><span class="am-icon-calendar"></span> Feedback Result</a></li>
          </ul>
        </li>
        
        <li class="admin-parent">
          <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-file"></span> Job <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav2">
            <li><a href="#JobAddHR.php"><span class="am-icon-pencil-square-o"></span>Add Job</a></li>
            <li><a href="#JobView.php"><span class="am-icon-pencil-square-o"></span>Job View</a></li>
          </ul>
        </li>
        
        <li class="admin-parent">
          <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-file"></span> Resume <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav1">
            <li><a href="#ViewProfile.php"><span class="am-icon-pencil-square-o"></span> Resume View</a></li>
            <li><a href="#Resume.php" class="am-cf"><span class="am-icon-check"></span> Change Resume<!-- <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"> --></span></a></li>
            <li><a href="#ResumeDisplay.php"><span class="am-icon-puzzle-piece"></span> Display Resume</a></li>
          </ul>
        </li>
        <li><a href="#user-info.php"><span class="am-icon-user"></span> Personal information</a></li>
        <li><a href="#OnlineDic.php"><span class="am-icon-table"></span> Online Dictionary</a></li>
        <li><a href="#Notification.php"><span class="am-icon-calendar"></span> Announcement</a></li>
        <li><a href="logout.php"><span class="am-icon-sign-out"></span> Log Out</a></li>
        
      </ul>
    
      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> Announcement</p>
          <p style="word-break:break-all;">
            <?php
              $file=fopen('Notification.txt', 'r');
              echo fread($file,"280");
              fclose($file);
            ?>
          </p>
        </div>
      </div>

    </div>
  </div>