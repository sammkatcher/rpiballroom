<h1 class="title">Membership Sheet Parser</h1>
<div id="node-10" class="node clear-block">
  <div class="meta">
  </div>

  <div class="content">

    <p>For this to work, you must download the membership list as a .tsv file or a .csv file that is semicolon-delimited.</p>
    <p>After loading your spreadsheet, a "Refresh" button will appear and you may choose different options and press that "Refresh" button.</p>

    <h3>Type of Info</h3>
    <form id="type_form" action="">
      <input type="radio" name="info" value="email" checked>Email<br />
      <input type="radio" name="info" value="rin">RIN<br />
    </form>
    <br />
    <h3>Branch of Club</h3>
    <form id="branch_form" action="">
      <input type="radio" name="branch" value="all" checked>ALL<br />
      <input type="radio" name="branch" value="lindy">Lindy<br />
      <input type="radio" name="branch" value="tango">Tango<br />
      <input type="radio" name="branch" value="club">Ballroom/Latin<br />
      <input type="radio" name="branch" value="team">Team<br />
    </form>
    <br />
    <b>Input spreadsheet: </b><input type="file" id="fileinput" />
    <script type="text/javascript" src="js/membership_sheet_parser.js"></script>
    <br />
    <div id="filerefresh_button"></div>
    <div id="results_area"></div>
  </div>

</div>
