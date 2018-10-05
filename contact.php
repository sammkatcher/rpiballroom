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

<h1> Contact Us </h1>
<h3>Looking for lesson <a href="/schedule">schedule</a>? <a href="/pricing">Pricing information</a>? Check out our <a href="/faq">FAQ page</a>!</h3>

<!-- <form role="form" accept-charset="UTF-8" method="post" action="send_form_email" id="contact-mail-page">
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
    <button type="submit" class="btn btn-default btn-ballroom">Send e-mail</button>
  </div>
</form>
-->

<table class="table">
  <thead>
    <tr>
      <th>Branch</th>
      <th>Contact Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><strong>General</strong></td>
      <td><?php echo($president)?></td>
      <td><?php echo($president_email)?></td>
    </tr>
    <tr>
      <td><strong>Showcase Request</strong></td>
      <td><?php echo($president)?></td>
      <td><?php echo($president_email)?></td>
    </tr>
    <tr>
      <td><strong>Ballroom Competition</strong></td>
      <td><?php echo($comp_coord)?></td>
      <td><?php echo($comp_coord_email)?></td>
    </tr>
    <tr>
      <td><strong>Ballroom/Latin Contact</strong></td>
      <td><?php echo($latin_vp)?></td>
      <td><?php echo($latin_vp_email)?></td>
    </tr>
    <tr>
      <td><strong>Lindy Contact</strong></td>
      <td><?php echo($lindy_vp)?></td>
      <td><?php echo($lindy_vp_email)?></td>
    </tr>
    <tr>
      <td><strong>Team Contact</strong></td>
      <td><?php echo($captain1)?></td>
      <td><?php echo($captain1_email)?></td>
    </tr>
    <tr>
      <td><strong>Social Dance Contact</strong></td>
      <td><?php echo($soc_chair)?></td>
      <td><?php echo($social_chair_email)?></td>
    </tr>
  </tbody>
</table>