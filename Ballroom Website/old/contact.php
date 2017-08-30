<?php 

   $subjs = array('comp','gen','latin','lindy','tango','team','show','web');
   if(isset($_GET['subj'])) {
   $subject = filter_input(INPUT_GET, 'subj', FILTER_SANITIZE_SPECIAL_CHARS);
   if (!in_array($subject,$subjs)){
   $subject = 'web';
   }
   }
   else{
   $subject = 'web';
   }
   ?>
<h1 class="title">Contact</h1>												
<form  accept-charset="UTF-8" method="post" action="<?php echo($PAGE_PATH);?>send_form_email" id="contact-mail-page">
  <div>You can leave a message using the contact form below. <strong>Please be sure to specify the category under which your message belongs.</strong> Alternatively, you can ask and discuss your question on the RPI Ballroom Forum at the link above.<div class="form-item" id="edit-name-wrapper">
      <label for="edit-name">Your name: <span class="form-required" title="This field is required.">*</span></label>
      <input type="text" maxlength="255" name="name" id="edit-name" size="60" value="" class="form-text required" />
    </div>
    <div class="form-item" id="edit-mail-wrapper">
      <label for="edit-mail">Your e-mail address: <span class="form-required" title="This field is required.">*</span></label>
      <input type="text" maxlength="255" name="mail" id="edit-mail" size="60" value="" class="form-text required" />
    </div>
    <div class="form-item" id="edit-subject-wrapper">
      <label for="edit-subject">Subject: <span class="form-required" title="This field is required.">*</span></label>
      <input type="text" maxlength="255" name="subject" id="edit-subject" size="60" value="" class="form-text required" />
    </div>
    <div class="form-item" id="edit-cid-wrapper">
      <label for="edit-cid">Category: <span class="form-required" title="This field is required.">*</span></label>
      <select name="cid" class="form-select required" id="edit-cid" >
	<option value="4" <?php if ($subject == 'comp'){ echo("selected=\"selected\"");} ?>>Competition - Contact</option>
	<option value="3" <?php if ($subject == 'gen'){ echo("selected=\"selected\"");} ?>>General</option>
	<option value="8" <?php if ($subject == 'latin'){ echo("selected=\"selected\"");} ?>>Group Specific: Ballroom/Latin</option>
	<option value="5" <?php if ($subject == 'lindy'){ echo("selected=\"selected\"");} ?>>Group Specific: Lindy Hop</option>
	<option value="7" <?php if ($subject == 'tango'){ echo("selected=\"selected\"");} ?>>Group Specific: Tango</option>
	<option value="6" <?php if ($subject == 'team'){ echo("selected=\"selected\"");} ?>>Group Specific: Team</option>
	<option value="2" <?php if ($subject == 'show'){ echo("selected=\"selected\"");} ?>>Request a Showcase Performance</option>
	<option value="1" <?php if ($subject == 'web'){ echo("selected=\"selected\"");} ?>>Website Feedback</option>
      </select>
    </div>
    <div class="form-item" id="edit-message-wrapper">
      <label for="edit-message">Message: <span class="form-required" title="This field is required.">*</span></label>
      <textarea cols="60" rows="5" name="message" id="edit-message"  class="form-textarea resizable required"></textarea>
    </div>
    <input type="submit" name="op" id="edit-submit" value="Send e-mail"  class="form-submit" />
    <input type="hidden" name="form_build_id" id="form-cc893bdd7117ef4c0d216c3e3fe2ccd1" value="form-cc893bdd7117ef4c0d216c3e3fe2ccd1"  />
    <input type="hidden" name="form_id" id="edit-contact-mail-page" value="contact_mail_page"  />

</div></form>

