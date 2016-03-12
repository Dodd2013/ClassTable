<div class="am-u-sm-centered">
  <form target="msg" class="am-form" method="post" action="addfeedback.php" id='form1'>
    <div class="am-form-group">
    <div class="am-u-sm-12">
      <input type="text" id="doc-ipt-3" name="name" placeholder="Enter Feedback Name!">
    </div>
    <div class="am-u-sm-12 am-padding">
      <textarea class="" rows="5" id="doc-ta-1" name="des" placeholder="Enter Feedback Description!"></textarea>
    </div>
    <div class="am-u-sm-6">
    	<div class="am-form-group am-form-icon">
    	    <i class="am-icon-calendar"></i>
    	    <input size="16" name="begintime" type="text" readonly value=<?php print("'".date('Y-m-d H:i',time())."'"); ?> class="form-datetime am-form-field" placeholder="End Time">
    	</div>
    	<div class="am-form-group am-form-icon">
    	    <i class="am-icon-calendar"></i>
    	    <input size="16" type="text" name="endtime" readonly value=<?php print("'".date('Y-m-d H:i',time())."'"); ?> class="form-datetime am-form-field" placeholder="End Time">
    	</div>
    	<div class="am-u-sm-centered am-btn-group doc-js-btn-1" data-am-button>
              <label class="am-btn am-btn-primary">
                <input type="radio" name="askgroup" value="1" id="optio"> Ask Group
              </label>
              <label class="am-btn am-btn-primary am-active">
                <input type="radio" name="askgroup" value="0" checked id="opti"> No  Group
              </label>
              <!-- <label class="am-btn am-btn-primary am-active">
                <input type="radio" name="types" value="3" id="option3" checked> Write
              </label> -->
<!--               <label class="am-btn am-btn-primary am-disabled">
                <input type="radio" name="types" value="选项 4" id="option4"> 选项 4
              </label> -->
            </div>
    </div>
    <div class="am-u-sm-6">
    	<div id="adddiv" class="am-from-group">
    		
    	</div>
    	<div id='addansdiv'><a id='addansbtn'  class='am-icon-md am-secondary am-icon-plus-square'></a><label>   Click plus to add problem...</label></div>
    </div>
  </div>
  <div class="am-from-group">
  <div class="am-u-sm-12 am-padding">
  	<button type="submit"  onclick="submitfrom();" class="am-btn am-btn-block ">Submit</button>
  	</div>
  </div>
  </form>
</div>
<script>
	var num=1;
    $("#addansbtn").click(function(){
      add="<input class='am-form-field am-input-sm' style='margin:5px;' type='text' placeholder='Enter the problem"+num+" ID num. ' name='problem"+num+"'>";
      num++;
      $("#adddiv").append(add);
    });
  function submitfrom(){
    $("#my-alert").modal('toggle');
  }
  $(function() {
    $('.form-datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii'});
  });
</script>