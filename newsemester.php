<div class="am-u-sm-centered">
 	<form target="msg" class="am-form" method="post" action="addsemester.php" id='form1'>
		<label >Begin Time:
		  <input type="date" name="begintime">
		</label>
		<label >End Time:
		  <input type="date" name="endtime">
		</label>
		<label >Name:
		  <input type="text" name="name">
		</label>
		<label>  
			<button type="submit" onclick="submitfrom();" class="am-btn am-btn-primary">Submit</button>
		</label>
		
 	</form>
</div>
<script>
function submitfrom(){
    $("#my-alert").modal('toggle');
  }
</script>