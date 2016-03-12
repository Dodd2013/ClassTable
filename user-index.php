<div class="am-g"><div class="am-u-sm-4 am-u-sm-centered"><h1 >Welcome <?php
session_start();
 print($_SESSION["username"]);?>!</h1></div></div>
        <!-- <div class="am-g">
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last Feedback
          <hr/>
          </div></div>
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last Job
          <hr/>
          </div></div>
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last News
          <hr/>
          </div></div>
        </div> -->
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