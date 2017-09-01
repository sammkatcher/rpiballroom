<?php

   $subjs = array('comp','gen','latin','lindy','tango','team','show','web');
   if(isset($_GET['subj'])) {
   $subject = filter_input(INPUT_GET, 'subj', FILTER_SANITIZE_SPECIAL_CHARS);
   if (!in_array($subject,$subjs)){
   $subject = 'gen';
   }
   }
   else{
   $subject = 'gen';
   }
   ?>

<h3>Looking for lesson <a href="/schedule">schedule</a>? <a href="/pricing">Pricing information</a>? Check out our <a href="/faq">FAQ page</a>!</h3>

<h3>The form is currently broken.</h3>

<p>Please visit our <a href='http://www.facebook.com/RPIBallroom'>Facebook page</a> or contact galczj AT rpi DOT edu</p>

<form role="form" accept-charset="UTF-8" method="post" action="send_form_email" id="contact-mail-page">
  <div class="form-group">
    <label class="control-label" for="edit-name">Name:</label>
    <input name="name" type="text" class="form-control" id="email" placeholder="Your name">
  </div>

  <div class="form-group">
    <label class="control-label" for="edit-mail">Your Email address:</label>
    <input name="mail" type="email" class="form-control" id="pwd" placeholder="Your email address">
  </div>

  <div class="form-group">
    <label class="control-label" for="edit-subject">Subject:</label> 
    <input name="subject" type="text" class="form-control" id="pwd" placeholder="Subject">
  </div>

  <div class="form-group">
    <label for="sel1">Category:</label>
    <select name="cid" class="form-control" id="edit-cid">
	<option value="4" <?php if ($subject == 'comp'){ echo("selected=\"selected\"");} ?>>Competition - Contact</option>
	<option value="1" <?php if ($subject == 'gen'){ echo("selected=\"selected\"");} ?>>General</option>
	<option value="8" <?php if ($subject == 'latin'){ echo("selected=\"selected\"");} ?>>Group Specific: Ballroom/Latin</option>
	<option value="5" <?php if ($subject == 'lindy'){ echo("selected=\"selected\"");} ?>>Group Specific: Lindy Hop</option>
	<option value="7" <?php if ($subject == 'tango'){ echo("selected=\"selected\"");} ?>>Group Specific: Tango</option>
	<option value="6" <?php if ($subject == 'team'){ echo("selected=\"selected\"");} ?>>Group Specific: Team</option>
	<option value="2" <?php if ($subject == 'show'){ echo("selected=\"selected\"");} ?>>Request a Showcase Performance</option>
	<option value="3" <?php if ($subject == 'web'){ echo("selected=\"selected\"");} ?>>Website Feedback</option>
    </select>
  </div>

  <div class="form-group">
    <label class="control-label" for="comment">Message:</label>
    <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
  </div>

  <div class="form-group">        
    <button type="submit" class="btn btn-default disabled">Send e-mail</button>
  </div>
</form>