<?php//include variables for the siterequire_once('VARS.php');// if this page wasn't included from index.php, redirect to 404if(!checkinclude($INCLUDED)) {    header("location:".$PAGE_PATH."404");     die();}?>
<h1 class="text-center">Class Schedule</h1>
<div class="row">
  <!-- ARGENTINE TANGO -->
  <div class="col-sm-6 text-center">
    <h2>Open Practice (All Groups)</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Monday (Studio)</dt>
	    <dd>Practice: 5:30-7:30pm</dd>
	  </dl>
	  <dl>
	    <dt>Wednesday (Studio)</dt>
	    <dd>Practice: 12:00-2:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Thursday (Studio)</dt>
	    <dd>Practice: 2:00-4:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
  <!-- LINDY HOP -->
  <div class="col-sm-6 text-center">
    <h2>Lindy Hop</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Monday (Studio)</dt>
	    <dd>Open Practice: 8:00-10:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Tuesday (AUD)</dt>
	    <dd>Open Practice: 6:00-8:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Wednesday (87 Gym)</dt>    
	    <dd>Open Practice: 6:00-7:00pm</dd>
	    <dd>Lindy II: 7:00-8:00pm</dd>
	    <dd>Lindy I: 8:00-9:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
</div>
<div class="row">
  <!-- BALLROOM LATIN -->
  <div class="col-sm-6 text-center">
    <h2>Ballroom/Latin</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Tuesday (Studio)</dt>
	    <dd>Advanced: 7:00-8:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Thursday (Studio)</dt>
	    <dd>Beginner: 6:00-7:00pm</dd>
	    <dd>Intermediate: 7:00-8:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
  <!-- TEAM -->
  <div class="col-sm-6 text-center">
    <h2>Ballroom Team</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Lessons (Studio)</dt>
	    <dd>Sun: 3:00-5:00pm</dd>
	    <dd>Tues: 8:00-9:00pm</dd>
	    <dd>Thurs: 8:15-9:30pm</dd>
	  </dl>
	  <dl>
	    <dt>Open Practices</dt>
	    <dd>Mon: 5:30-8:00pm (Studio)</dd>
	    <dd>Wed: 6:00-8:00pm (Studio)</dd>
	    <dd>Fri: 5:00-7:00pm (Studio)</dd>
	    <dd>Sat: 1:00-5:00pm (Studio)</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
</div>

<h2>Location</h2>
<p>All Ballroom/Latin, Lindy Hop, and Team lessons are held in Academy Hall at RPI, located at the intersection of 15th Street and College Avenue, across from Moe’s. A parking lot is available behind Academy Hall, accessible on College Avenue.</p>
<p>Events marked with (Studio) are in the Dance Studio, formerly known as the Student Activities Room (SAR), which is on the first floor of academy hall (down one flight of stairs). </p>
<p>Events marked with (AUD) are in the Auditorium, which is on the third floor of academy hall (up one flight of stairs). </p>

<h2>When Do Lessons Start?</h2>
<?php echo($start_of_lesson_message)?>

<h2>How Much do Lessons Cost?</h2>
<p>
  Check out our <a href="pricing">pricing</a> page!
</p>

<h2>Need Extra Help?</h2>
<p>Our mentors can help you! Check out their <a href="mentors">schedule!</a></p>

<h2>Academy Hall</h2>
<div class="google-map clearfix">
  <div class="row">
    <div class="col-sm-8">
      <div class="embed-responsive embed-responsive-4by3">
	<iframe class="embed-responsive-item" max-height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2930.879785323782!2d-73.67871555!3d42.7274351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89de0f0ae7ff9179%3A0x597958693f828b04!2sAcademy+Hall%2C+Rensselaer+Polytechnic+Institute%2C+Troy%2C+NY+12180!5e0!3m2!1sen!2sus!4v1433717399911"></iframe>
      </div>
    </div>
  </div>
</div>
