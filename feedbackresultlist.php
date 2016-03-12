<table class="am-table am-table-bordered am-table-striped am-table-hover am-table-centered">
	<thead>
		<tr>
			<th>Batch</th>
			<th>Last Submit Time</th>
			<th>Online Result</th>
			<th>DownLoad EXL</th>
		</tr>
	</thead>
	<tbody>
		<tr class="am-primary">
			<td><b>All Batches</b></td>
			<td> <b>
			<?php 
			if($_GET){
				require_once 'DAO.php';
				$db=new DB();
				$data['fb_id'] = $_GET['fb_id'];
				$judge['fb_id'] = '=';
				list($conSql, $mapConData) = $db->FDFields($data, 'and', $judge);
				$tData = $db->fetch('select max(sub_time) as a from tb_submit where ' . $conSql, $mapConData);
				print($tData['a']);
			}
			?></b>
			</td>
			<td><b><a href="javascript:;" onclick="openresult('<?php print($_GET['fb_id']); ?>','')">Click</a></b></td>
			<td><b><a href="javascript:;" onclick="getresultexl('<?php print($_GET['fb_id']); ?>','')">Click</a></b></td>
		</tr>
		<?php 
		if($_GET){
			$mData = $db->fetch('select fb_askgroup from tb_feedbacks where ' . $conSql, $mapConData);
			if($mData['fb_askgroup']==0){
				print("<tr><td colspan=4>This feedback not ask the batch! So just see ALL Result up here!</td></tr>");
			}else{
				$groupsData = $db->fetchALL('select * from (select groups,sub_time from tb_submit where' . $conSql." order by sub_time desc) as tb group by groups", $mapConData);
				//var_dump($groupsData);
				foreach ($groupsData as $key => $value) {
					print("
						<tr>
							<td>".$value['groups']."</td>
							<td>".$value['sub_time']."</td>
							<td><a href='javascript:;' onclick='openresult(\"".$_GET['fb_id']."\",\"".$value['groups']."\")'>Click</a></td>
							<td><a href='javascript:;' onclick='getresultexl(\"".$_GET['fb_id']."\",\"".$value['groups']."\")'>Click</a></td>
						</tr>
						");
				}
			}
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
          function openresult(id,batch) {
            var url="feedbackresult.php?fb_id="+id;
            if(batch!='')url+="&group="+batch;
            window.open(url,'Feedback','fullscreen=yes,directories=no,titlebar=no,location=no,menubar=no,toolbar=no');
          };
          function getresultexl(id,batch) {
            var url="getresultexl.php?fb_id="+id;
            if(batch!='')url+="&group="+batch;
            window.open(url,'Feedback','fullscreen=yes,directories=no,titlebar=no,location=no,menubar=no,toolbar=no');
          };
</script>