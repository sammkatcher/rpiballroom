<h1 class="title">Point Calculator</h1>

<form action="index.php" method="get">
  <input type="hidden" name="page" value="pointCalculator" />
  <div class='row'>
    <div class='col-sm-6'>
      <div class="form-group">
	<label for="fname">First Name:</label>
	<input type="text" class="form-control" name="fname">
      </div>
    </div>
    <div class='col-sm-6'>
      <div class="form-group">
	<label for="lname">Last Name:</label>
	<input type="text" class="form-control" name="lname">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-default btn-ballroom">Go!</button>
</form>

<p>Note that this uses data directly from o2cm and does not pull data from other sources (such as dance.zsconcepts.com). Also note this means that your name must be spelled <b>EXACTLY</b> like it is shown on o2cm.</p>
<p>Note that if your name is listed with an apostraphe, use a grave accent (a.k.a. back-tick, typically on the same key as the tilde, ~) instead.</p>
