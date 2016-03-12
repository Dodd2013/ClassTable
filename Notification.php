
        <form target="msg" method="post" action="setnoti.php" >
          <textarea name="textarea" cols="40" rows="10" placeholder="Type the notification."></textarea>
          <br>
          <br>
          <button type="submit" onclick="submitfrom();">Submit</button>
        </form>
<script>
  function submitfrom(){
    $("#my-alert").modal('toggle');
  }
</script>