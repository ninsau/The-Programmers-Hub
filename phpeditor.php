<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
  $handle = fopen('run.php', 'w');
  if(isset($_POST['code'])) {
    $code = array(' ', $_POST['code']);
    $code1 = implode('<?php ', $code);
    fwrite($handle, $code1);
    $handle2 = fopen('run.html', 'a');
    fwrite($handle, ' ?>');
    header('Location: run.php');
  }
   ?>
   <title>PHP environment | The Hub </title>
   <script type="text/javascript">
   function loadCode () {
     if (window.XMLHttpRequest) {
       xmlhttp = new XMLHttpRequest();
     }else {
       xmlhttp = new ActiveObject('Microsoft.XMLHTTP');
     }
     xmlhttp.onreadystatechange = function () {
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         document.getElementById('code1').innerHTML = xmlhttp.responseText;
       }
     }
     para = 'code='+document.getElementById('code').value;
     xmlhttp.open('POST', 'phpeditor.php', true)
     xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
     xmlhttp.send (para);
   }
   </script>
   <div class="row">
   <div class="text-xs-center col-md-7" style="margin-top: 5px;">
     <div class="text-center" id="intro-section">
       <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
       <div class="col-md-6 container">
       <h2>Welcome to our <strong class="animated fadeIn" style="color: indigo; font-family: monospace;">PHP environment!</strong></h2>
       <p class="animated fadeIn">Test your PHP code in real time using this PHP environment. DO NOT begin your script with the php tags. Enjoy!</p>
   <hr>
   <button class="btn-outline-success btn-block btn-rounded btn" onclick="loadCode()" name="submit">run code</button><br>
    <div class="input-group md-form">
   <textarea class="lg-textarea" id="code" name="code" placeholder="Your code here...(Do not include php tags) Stretch the area if you prefer" style="height: 350px; background-color: black; color: white; border-radius: 20px;" required></textarea></div>
</div>
</div>
</div>
<div class="text-xs-center col-md-5 container">
<h2 style="margin-top: 5px; font-family: Georgia;">Results</h2><hr>
<div id="code1"></div>
</div>
</div>
<?php
 include 'footer.php';
 ?>
