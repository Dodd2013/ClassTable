
        <table class="am-table-compact am-table-centered am-table am-table-bordered am-table-radius am-table-striped am-table-striped am-table-hover">
          <thead>
            <tr>
              <td class="am-text-middle">Id</td>
              <td class="am-text-middle">Name</td>
              <td class="am-text-middle">Begin Time</td>
              <td class="am-text-middle">End Time</td>
              <td class="am-text-middle">Group</td>
              <td class="am-text-middle">User</td>
            </tr>
          </thead>
          <tbody id='tbdiv'>
            <?php 
            require 'config.php';
            
              $l=0;
              $num=$NUM_OF_PROBLEM_PAGE;
              if($_GET){
                $l=($_GET['page']-1)*$num;
              }
              require_once 'DAO.php';
              $db=new DB();
              $mData = $db->fetchAll('select fb_id,fb_name,fb_begin,fb_end,fb_askgroup,fb_create_user from tb_feedbacks order by fb_id desc',array(),array($l,$num));
              //var_dump($mData);
              $count=$db->fetchAll('select count(*) as a from tb_feedbacks');
              $count=$count[0]['a'];
              //var_dump($count);
              if($mData){
                foreach ($mData as $fkey => $va) {
                  print("<tr class='am-primary' style='cursor:pointer;' onclick='location.hash=\"#feedbackresultlist.php?fb_id=".$va['fb_id']."\"'>");
                  foreach ($va as $key => $value) {
                    if($key=='fb_askgroup'){
                      if($value=='0')$value='No';
                      if($value=='1')$value='Yes';
                    }
                    print("<td class='am-text-middle'>".$value."</td>");
                  }
                  print("</tr>");
                }
              }
             ?>
          </tbody>
        </table>
        <?php 
        require_once 'include/tools.php';
        $page=1;
        if($_GET){
          $page=$_GET['page'];
        }
        tools::getPageHtml($page, $count%$num?$count/$num+1:$count/$num, "#feedbacklist.php");
        ?>