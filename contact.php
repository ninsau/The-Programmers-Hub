<?php
require 'core.inc.php';
include 'header.php';
 ?>
<!--contact form-->
<div class="container-fluid">
<form action="contact.send.php" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
<div class="form-group col-md-6">
<input type="text" name="name" class="form-control"  required="required" placeholder="Name">
</div>
<div class="form-group col-md-6">
<input type="email" name="email" class="form-control" required="required" placeholder="Email">
</div>
<div class="form-group col-md-12">
<input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
</div>
<div class="form-group col-md-12">
<textarea class="md-textarea" name="message" id="message" required="required"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
</div>
<div class="form-group col-md-12">
<input type="submit" name="submit" class="btn btn-indigo pull-right" value="Submit">
</div>
</form>
<!--/.contact form-->
<p>Email: cassidyblay@gmail.com<br>
   Phone: +233242877574<br>
 Location: Accra, Ghana</p>
</div>
<?php
 include 'footer.php';
 ?>
