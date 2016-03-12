
        <form target="msg" class="am-form am-form-horizontal" method="post" action="changeinfo.php" enctype="multipart/form-data">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <?php session_start();
$img = "userdata/img/" . $_SESSION['img'];
if ($_SESSION['img'] == '') {
	print("<img id='imgc' class='am-img-circle am-img-thumbnail' src='http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80' alt=''/>");
} else {
	print("<img id='imgc' class='am-img-circle am-img-thumbnail' src='$img' alt=''/>");
}

?>
               </div>
              <div class="am-u-md-8">
                <p>Upload your head portrait!</p>
                  <div class="am-form-group">
                    <input type="file" id="user-pic" name='user-pic' >
                    <p class="am-form-help">Plese select the picture...</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
          <div class="am-form-group">
            <label for="user-oldpwd" class="am-u-sm-3 am-form-label">Old Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-oldpwd" name='oldpwd' placeholder="输入你的旧密码">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-newpwd" class="am-u-sm-3 am-form-label">New Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-newpwd" name='newpwd' placeholder="输入你的新密码">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-confimpwd" class="am-u-sm-3 am-form-label">Confim Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-confimpwd" name='confimpwd' placeholder="再次输入新密码">
            </div>
          </div>
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" onclick="submitfrom();" class="am-btn am-btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
<script>
function submitfrom(){
  $("#my-alert").modal('toggle');
}
document.getElementById('user-pic').onchange = function(evt) {
    // 如果浏览器不支持FileReader，则不处理
    if (!window.FileReader) return;
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // img 元素
                document.getElementById('imgc').src = e.target.result;
            };
        })(f);
        reader.readAsDataURL(f);
    }
}
</script>