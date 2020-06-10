<?php//include variables for the siterequire_once('VARS.php');// if this page wasn't included from index.php, redirect to 404if(!checkinclude($INCLUDED)) {    header("location:".$PAGE_PATH."404");     die();}?>
<h1 class="text-center">Class Schedule</h1>
<img class="img-responsive" style="float:right;padding:5px" src="/site_images/ballroom_schedule_calendar.jpg"/>
  <!-- REPLACED SCHEDULE TABLE WITH PICTURE 9/10/2019
<div class="row">      9/10/2019-->
  <!-- TEAM -->
  <!-- 9/10/2019
  <div class="col-sm-6 text-center">
    <h2>Ballroom Team</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Sunday (Studio)</dt>
	    <dd>Newcomer: 2:00-3:00pm</dd>
	    <dd>All Team: 3:00-4:00pm</dd>
	    <dd>Bronze: 4:00-5:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Tuesday (Studio)</dt>
	    <dd>Bronze Lessons: 6:00-7:00pm</dd>
	    <dd>Silver Lessons: 8:00-9:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Thursday (Studio)</dt>
	    <dd>All Team: 8:00-9:00pm</dd>
	  </dl>
	             9/10/2019-->
	  <!--    OPEN PRACTICES COMMENTED OUT FOR NOW          
	  <dl>
	    <dt>Open Practices</dt>
	    <dd>Mon: 5:30-8:00pm (Mueller Center 1&amp;2)</dd>
	    <dd>Wed: 6:00-8:00pm (TBA)</dd>
	    <dd>Fri: 5:00-7:00pm (TBA)</dd>
	    <dd>Sat: 1:00-5:00pm (TBA)</dd>
	  </dl>
	  --> <!-- 9/10/2019
	</td>
      </tr>
    </table>
  </div>     9/10/2019 -->
  <!-- BALLROOM LATIN -->           <!-- 9/10/2019
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
</div>
<div class="row">              9/10/2019 -->
  <!-- OPEN PRACTICES TEAM -->      <!--9/10/2019
  <div class="col-sm-6 text-center">
    <h2>Open Practice (Team)</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Sunday (Studio)</dt>
	    <dd>Practice: 1:00-2:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Monday, Wednesday, Friday (Studio)</dt>
	    <dd>Practice: 4:00-8:00pm</dd>
	  </dl>
	  <dl>
	    <dt>Saturday (Studio)</dt>
	    <dd>Practice: 1:00-5:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>              9/10/2019-->
  <!-- OPEN PRACTICES CLUB -->        <!--
  <div class="col-sm-6 text-center">
    <h2>Open Practice (Club)</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Monday (Studio)</dt>
	    <dd>Practice: 6:00-8:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>               9/10/2019-->
  <!-- Mentoring -->
  <!-- 9/5/19 Mentoring commented out until it's decided. Connected to the navbar (in index)
  <div class="col-sm-6 text-center">
    <h2>Mentoring</h2>
    <table class="center-table text-center">
      <tr>
	<td>
	  <dl>
	    <dt>Wednesday (Studio)</dt>
	    <dd>Smooth, Rhythm: 6:30-7:30pm</dd>
	  </dl>
	  <dl>
	    <dt>Saturday (Studio)</dt>    
	    <dd>Standard: 1:00-3:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
  -->
<!-- </div>              9/10/2019-->

  <!-- LINDY HOP -->
  <!-- LINDY HOP DISCONTINUED
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
	    <dt>Wednesday (Auditorium)</dt>    
	    <dd>Lindy II: 6:00-7:00pm</dd>
	    <dd>Lindy I: 7:00-8:00pm</dd>
	  </dl>
	</td>
      </tr>
    </table>
  </div>
</div>
  -->
<h2>Location</h2>
<p>All Ballroom/Latin and Team lessons are held in Academy Hall at RPI, located at the intersection of 15th Street and College Avenue, across from Moe’s. A parking lot is available behind Academy Hall, accessible on College Avenue.</p>
<p>Events marked with (Studio) are in the Dance Studio, formerly known as the Student Activities Room (SAR), which is on the first floor of academy hall (down one flight of stairs). </p>


<h2>When Do Lessons Start?</h2>
<?php echo($start_of_lesson_message)?>

<h2>How Much do Lessons Cost?</h2>
<p>
  Check out our <a href="pricing">pricing</a> page!
</p>

<!--<h2>Need Extra Help?</h2>
<p>Our mentors can help you! Check out their <a href="mentors">schedule!</a></p> COMMENTED OUT AS OF 9/9/19-->

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
