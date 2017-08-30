<?php//include variables for the siterequire_once('VARS.php');// if this page wasn't included from index.php, redirect to 404if(!checkinclude($INCLUDED)) {    header("location:".$PAGE_PATH."404");     die();}?>
<h1 class="title">FAQs</h1>

<?php include('pricing.php') ?>
<br />

<h3>When do lessons begin?</h3>
<?php echo($start_of_lesson_message)?>
<br />

<h3>When are lessons?</h3>
<p>You can view our <a href="/schedule">lesson schedule</a> or check out our <a href="/calendar">calendar!</a></p>
<br />

<h3>What happens if I miss a lesson?</h3>
<p>Although we do not recommend missing lessons, there is no long-term penalty if you miss one or two.  Our instructors frequently review learned material, building on past classes, so you will be able to pick it up then.</p>
<br />

<h3>Do I need previous ballroom dance experience?</h3>
<p>Certainly not!  You can still join any of our groups without knowing a thing.  You only need an interest.  In fact, most people who join us every semester have never danced before.</p>
<br />

<h3>Do I need to bring a partner?</h3>
<p>Not at all!  We rotate partners throughout lessons, so you will dance with many people.</p>
<br />

<h3>What is the difference between a practice and a lesson?</h3>
<p>Lessons are structured group classes taught by an instructor, while practices are unstructured informal times meant to work on lesson material.</p>
<br />

<h3>Do I need any special clothing or shoes?</h3>
<p>Nope, just come with comfortable clothing and shoes.  Many in the Ballroom/Latin and Argentine Tango tracks dance with their socks on, while soft-soled sneakers like Converses are popular in the Lindy Hop track.  If you have ballroom dance shoes, however, feel free to wear them!</p>
<br />

<h3>I am not a student or affiliated with RPI. Can I still join?</h3>
<p>Of course!  Our lessons and practices are open to everyone.  We draw a fair number of non-RPI people every semester.</p>
<br />

<h3>Where and how do I sign up?</h3>
<p>Just come to a lesson and let us know at the door or you can <a href="/contact">email us</a>! Be sure to check us out on <a href="http://facebook.com/RPIBallroom">Facebook</a> and look out for events!</p>
<br />

<h3>How can I make a donation to the club?</h3>
<p>We have more information on donating to club on our <a href="donate">donation page.</a></p>
<br />

<h3>What if I have other questions?</h3>
<p>If something is still unclear or you have questions that are unanswered, use our <a href="/contact">contact page</a> to reach us!</p>
