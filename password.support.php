<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
 ?>
 <h5>Fill this form to get started on resetting your password</h5><hr>
 <div class="col-md-4 right">
 <form action="password.send.php" method="POST">
 <div class="md-form input-group"><i class="fa fa-email prefix"></i>
 <input type="email" name="email" placeholder="Email" required>
 <span class="input-group-btn">
      <button class="btn btn-indigo btn-lg" type="submit"><i class="fa fa-send"></i></button>
  </span>
  </div>
 </form>
</div>
<?php
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
