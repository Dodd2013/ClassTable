
        <table class="am-table-compact am-table-centered am-table am-table-bordered am-table-radius am-table-striped am-table-striped am-table-hover">
          <thead>
            <tr>
              <td class="am-text-middle">ProblemId</td>
              <td class="am-text-middle">Problem Dec</td>
              <td class="am-text-middle">Type</td>
              <td class="am-text-middle">Author</td>
              <td class="am-text-middle">Time</td>
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
              $mData = $db->fetchAll('select * from tb_problems order by pro_id desc',array(),array($l,$num));
              //var_dump($mData);
              $count=$db->fetchAll('select count(*) as a from tb_problems');
              $count=$count[0]['a'];
              //var_dump($count);
              if($mData){
                foreach ($mData as $fkey => $va) {
                  print("<tr>");
                  foreach ($va as $key => $value) {
                    if($key=='pro_type'){
                      if($value=='3')$value='Write';
                      if($value=='2')$value='Checkbox';
                      if($value=='1')$value='Radio';
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
        tools::getPageHtml($page, $count%$num?$count/$num+1:$count/$num, "#feedback_problemlist.php");

        ?>