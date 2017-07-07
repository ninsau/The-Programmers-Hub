<?php
require 'core.inc.php';
if (!loggedin()) {
  die("unauthorised access");
}
 ?>
<div id="intro" class="text-xs-center">
  <div class="text-center" id="intro-section">
    <img src="img/thehub.ico.jpg" width="60" height="60">
    <div class="col-md-6 container">
    <h2>Contribute to our open source community by posting relevant and appropriate content here.</h2>
       <form action="read.php" method="POST" enctype="multipart/form-data">
          <div class="input-group md-form">
         <textarea class="md-textarea text-center" maxlength="500" name="text" placeholder="Type or Copy and Paste your programming news item or question here" id="text" required></textarea></div>
         <button type="submit" class="btn-indigo btn-block btn"  name="submit">Post</button><br><br>
       </form>
     </div>
</div>
</div>
