
        <div class="am-u-sm-centered">
          <form target="msg" class="am-form" method="post" action="addproblem.php" id='form1'>
            <div class="am-form-group">
                  <label for="doc-ta-1">Description:</label>
                  <textarea class="" rows="5" id="doc-ta-1" name="des" placeholder="Description"></textarea>
            </div>
            <div class="am-btn-group doc-js-btn-1" data-am-button>
              <label class="am-btn am-btn-primary">
                <input type="radio" name="types" value="1" id="option1"> Radio Problem
              </label>
              <label class="am-btn am-btn-primary">
                <input type="radio" name="types" value="2" id="option2"> Checkbox Problem
              </label>
              <label class="am-btn am-btn-primary am-active">
                <input type="radio" name="types" value="3" id="option3" checked> Write
              </label>
<!--               <label class="am-btn am-btn-primary am-disabled">
                <input type="radio" name="types" value="选项 4" id="option4"> 选项 4
              </label> -->
            </div>
            <div id='adddiv'>
              
            </div>
            <p><button type="submit" onclick="submitfrom();" class="am-btn am-btn-default">Submit</button></p>
          </form>
        </div>
<script>
function submitfrom(){
  $("#my-alert").modal('toggle');
}
  var checked=3;
  var flag=0;
  var num=1;
  function addbtn(){
    var add="<div id='addansdiv'><a id='addansbtn'  class='am-icon-md am-secondary am-icon-plus-square'></a><label>   Click plus to add answer...</label></div>";
    $("#adddiv").after(add);
    $("#addansbtn").click(function(){
      add="<input class='am-form-field am-input-sm' style='margin:5px;' type='text' placeholder='Enter the answer"+num+". ' name='ans"+num+"'>";
      num++;
      $("#adddiv").append(add);
      flag=1;
    });
  }
  $(document).ready(
    function(){
        $("input[name='types']").change(function() {
          var $selectedvalue = $("input[name='types']:checked").val();
           //alert($selectedvalue);
           if(flag){
            $("#adddiv").html("");
            num=1;
          }
          if ($selectedvalue == '1') {
            //alert('1');
              $("#addansdiv").remove();
              addbtn();
          }
          if ($selectedvalue == '2') {
            //alert('2');
            $("#addansdiv").remove();
              addbtn();
              
          }
          if ($selectedvalue == '3') {
            $("#addansdiv").remove();
          }
        });
  }
  );
</script>
