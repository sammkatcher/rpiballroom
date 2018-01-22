<h1 class="title"><?php echo($semester[date("n")].' '.date("Y")); ?> Executive Committee</h1>

<p>Officers may be contacted through the <a href="/contact">contact form</a>.</p>

<table id="officers" class="table table-condensed">
  <thead>
    <tr>
      <th>Position</th>
      <th class="text-right">Member</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>
      <h5>President</h5>
    </td>
    <td class="text-right"><em><?php echo($president)?></em></td>
  </tr>
  <!-- <tr>
    <td>
      <h5>VP, Argentine Tango</h5>
    </td>
    <td class="text-right"><em><?php echo($tango_vp)?></em></td>
  </tr> -->
  <tr>
    <td>
      <h5>VP, Ballroom/Latin</h5>
    </td>
    <td class="text-right"><em><?php echo($latin_vp)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>VP, Lindy Hop</h5>
    </td>
    <td class="text-right"><em><?php echo($lindy_vp)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Captain, Ballroom Team</h5>
    </td>
    <td class="text-right"><em><?php echo($captain1)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Captain, Ballroom Team</h5>
    </td>
    <td class="text-right"><em><?php echo($captain2)?></em></td>
  </tr>
  <!-- <tr>
    <td>
      <h5>Treasurer, Argentine Tango</h5>
    </td>
    <td class="text-right"><em><?php echo($tango_tres)?></em></td>
  </tr> -->
  <tr>
    <td>
      <h5>Treasurer, Ballroom &amp; Latin</h5>
    </td>
    <td class="text-right"><em><?php echo($latin_tres)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Treasurer, Lindy Hop</h5>
    </td>
    <td class="text-right"><em><?php echo($lindy_tres)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Treasurer, Ballroom Team</h5>
    </td>
    <td class="text-right"><em><?php echo($team_tres)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Marketing Chair</h5>
    </td>
    <td class="text-right"><em><?php echo($marketing)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Competition Coordinator</h5>
    </td>
    <td class="text-right"><em><?php echo($comp_coord)?></em></td>
  </tr>
  <tr>
    <td>
      <h5>Social Chair</h5>
    </td>
    <td class="text-right"><em><?php echo($social_chair)?></em></td>
  </tr>
  <!--tr>
    <td>
      <h5>Fundraising Chair</h5>
    </td>
    <td class="text-right"><em><?php echo($fundraising)?></em></td>
  </tr-->
  </tbody>
</table>

<!--Click <a href="<?php echo($ADMIN_PATH) ?>budget"> here </a> to enter the admin portion of the site.-->
