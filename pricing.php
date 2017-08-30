<?php
//include variables for the site
require_once('VARS.php');
// if this page wasn't included from index.php, redirect to 404
if(!checkinclude($INCLUDED)) {
  header("location:".$PAGE_PATH."404");
  die();
}
?>

<h3>How much does it cost to join?</h3>

<table class="table">
  <thead>
    <tr>
      <th></th>
      <th><b>Student</b></th>
      <th><b>Non-Student</b></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><b>Single Semester of Club</b></td>
      <td><?php echo($price_single_student);?></td>
      <td><?php echo($price_single_non);?></td>
    </tr>
    <tr>
      <td><b>Full Year Club (Available Fall Only)</b></td>
      <td><?php echo($price_full_student);?></td>
      <td><?php echo($price_full_non);?></td>
    </tr>
    <tr>
      <td><b>Single Semester of Team (Paid in Addition to Club Fees)</b></td>
      <td>+<?php echo($price_team_student);?></td>
      <td>+<?php echo($price_team_non);?></td>
    </tr>
  </tbody>
</table>

<p>If you are an RPI student, <?php echo($price_single_student);?> grants you access to all Argentine Tango, Lindy Hop Swing, and Ballroom/Latin lessons per semester (<?php echo($price_full_student);?> for the whole year).  The membership fee is <?php echo($price_single_non);?> for non-RPI students (<?php echo($price_full_non);?> per year).  Joining the Ballroom Team is an additional fee of <?php echo($price_team_student);?> per semester.  (With 2 Argentine Tango, 2 Lindy Hop Swing, and 3 Ballroom &amp; Latin Lessons available each week, membership opens you up to a total of 30 lessons each semester, so you definitely get your money's worth!)</p>
