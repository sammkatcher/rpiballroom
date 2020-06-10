<h1 class="title">Point Calculator</h1>

<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  define("NEWCOMER", 0);
  define("BRONZE", 1);
  define("SILVER", 2);
  define("GOLD", 3);

  include("simple_html_dom.php");

  class Comp {
    public $compName = "";
    public $compDate = "";
    public $compEvents = array();
  }

  class CompEvent {
    public $placement;
    public $totalNumCouples;
    public $numRounds;
    public $points;
    public $level;
    public $category;
    public $dance;
    public $url;
  }

  function numPoints($placement, $numRounds) {
    if ($numRounds >= 2 && $placement >= 1 && $placement <= 3) {
      switch ($placement) {
      case 1:
	return 3;
	break;
      case 2:
	return 2;
	break;
      case 3:
	return 1;
	break;
      default:
	return 0;
	break;
      }
    }
    else if ($numRounds >= 3 && $placement >= 4 && $placement <= 6) {
      return 1;
    }
    return 0;
  }

  function getPersonO2cmUrl( $firstName, $lastName ) {
    $url = "http://results.o2cm.com/individual.asp";
    $fnameFormName = "szFirst";
    $lnameFormName = "szLast";
    $url .= "?" . $lnameFormName . "=" . $lastName;
    $url .= "&" . $fnameFormName . "=" . $firstName;
    return $url;
  }

  function getPersonO2CMResults( $firstName, $lastName ) {
	/*if( ini_get('allow_url_fopen') ) {
		die('allow_url_fopen is enabled. file_get_contents should work well');
	} else {
		die('allow_url_fopen is disabled. file_get_contents would not work');
	} */
	#allow_url_fopen = ON;
	#allow_url_include = ON;
    $url = getPersonO2cmUrl($firstName, $lastName);
    $urlHTML = file_get_contents($url);
    return str_get_html($urlHTML);
  }

  function getEventInfo( $url, $fullname, &$numRounds, &$dances, &$totalNumCouples, &$inFinal ) {
    $urlHTML = file_get_contents($url);
    $pageHTML = str_get_html($urlHTML);
    $competitorNames = $pageHTML->find("a");
    $personFound = false;
    foreach($competitorNames as $competitorNameTag) {
      $competitorName = trim(strtolower($competitorNameTag->innertext));
      $competitorName = preg_replace('/\s+/', ' ', $competitorName);
      if ($competitorName == $fullname) {
	$personFound = true;
	break;
      }
    }

    $inFinal = $personFound;

    $select = $pageHTML->find("select[id=selCount]");
    if (sizeof($select) == 0) {
      $numRounds = 1;
    }
    else {
      $numRounds = sizeof($select[0]->find("option"));
    }
    $dances = array();
    $danceHeaders = $pageHTML->find("td[class=h3]");
    $pattern = "/(.+) (.+)/";
    if (sizeof($danceHeaders) == 1) {
      $fullDance = $danceHeaders[0]->innertext;
      $dance = str_replace("Intl. ", "", $fullDance);
      $dance = str_replace("Am. ", "", $dance);
      $dance = str_replace("*", "", $dance);
      if (strpos(strtolower($dance), "viennese waltz") !== false) {
	$dance = "V. Waltz";
      }
      array_push($dances, $dance);
    }
    foreach (array_slice($danceHeaders, 0, sizeof($danceHeaders)-1) as $danceHeader) {
      $fullDance = $danceHeader->innertext;
      $dance = str_replace("Intl. ", "", $fullDance);
      $dance = str_replace("Am. ", "", $dance);
      if (strpos(strtolower($dance), "viennese waltz") !== false) {
	$dance = "V. Waltz";
      }
      array_push($dances, $dance);
    }

    $totalNumCouples = 1;
    if ($numRounds != 1) {
      $ch = curl_init();
      $fields_string = "selCount=" . ($numRounds - 1);
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch,CURLOPT_POST,1);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
      $result = curl_exec($ch);
      curl_close($ch);
      $pageHTML = str_get_html($result);
    }
    $pageTables = $pageHTML->find("table[class=t1n]");
    $resultsTable = $pageTables[0];
    $totalNumCouples = sizeof($resultsTable->find("tr")) - 2;
  }

  function getLevel($str) {
    $str = strtolower($str);
    if (strpos($str, "newcomer") !== false) {
      return NEWCOMER;
    }
    if (strpos($str, "prebronze") !== false) {
      return NEWCOMER;
    }
    if (strpos($str, "pre-bronze") !== false) {
      return NEWCOMER;
    }
    if (strpos($str, "open bronze") !== false) {
      return BRONZE;
    }
    if (strpos($str, "beginner") !== false) {
      return BRONZE;
    }
    if (strpos($str, "syllabus") !== false) {
      return BRONZE;
    }
    if (strpos($str, "bronze") !== false) {
      return BRONZE;
    }
    if (strpos($str, "silver") !== false) {
      return SILVER;
    }
    if (strpos($str, "intermediate") !== false) {
      return SILVER;
    }
    if (strpos($str, "gold") !== false) {
      return GOLD;
    }
    if (strpos($str, "advanced") !== false) {
      return GOLD;
    }
    return -1;
  }

  function getCategory($str, $dance) {
    $str = strtolower($str);
    $dance = trim(strtolower($dance));
    if (strpos($str, "smooth") !== false) {
      return "Smooth";
    }
    if (strpos($str, "standard") !== false) {
      return "Standard";
    }
    if (strpos($str, "rhythm") !== false) {
      return "Rhythm";
    }
    if (strpos($str, "latin") !== false) {
      return "Latin";
    }
    if (strpos($str, "am.") !== false &&
	($dance == "waltz" ||
	 $dance == "tango" ||
	 $dance == "foxtrot" ||
	 $dance == "v. waltz")) {
      return "Smooth";
    }
    if (strpos($str, "intl.") !== false &&
	($dance == "waltz" ||
	 $dance == "tango" ||
	 $dance == "foxtrot" ||
	 $dance == "quickstep" ||
	 $dance == "v. waltz")) {
      return "Standard";
    }
    if (strpos($str, "am.") !== false &&
	($dance == "cha cha" ||
	 $dance == "rumba" ||
	 $dance == "swing" ||
	 $dance == "mambo" ||
	 $dance == "bolero")) {
      return "Rhythm";
    }
    if (strpos($str, "intl.") !== false &&
	($dance == "cha cha" ||
	 $dance == "rumba" ||
	 $dance == "samba" ||
	 $dance == "jive" ||
	 $dance == "paso doble")) {
      return "Latin";
    }
    return "None";
  }

  function getResults($fname, $lname) {
    $personPage = getPersonO2CMResults($fname, $lname);
    $compName = "";
    $compDate = "";
    $compsData = array();
    $compData = new Comp();
    $compCount = 0;
    foreach($personPage->find("td[class=t1n]") as $compRow) {
      $bTags = $compRow->find("b");
      if (sizeof($bTags) > 0) {
        $text = strtolower($bTags[0]->innertext);
        if (strpos($text, "no results") !== false) {
  	  echo "No Results. Make sure you name is input correctly";
  	  exit;
        }
        else {
	  if ($compCount > 0) {
	    if (sizeof($compData->compEvents) > 0) {
	      array_push($compsData, $compData);
	    }
	    $compData = new Comp();
	  }
          $pattern = "/(\d\d\-\d\d\-\d\d) \- (.*)/";
          preg_match($pattern, $text, $matches, PREG_OFFSET_CAPTURE);
          $compName = $matches[2][0];
          $compDate = $matches[1][0];
  	  echo "<b>" . $compName . "</b> on " . $compDate . "<br />";
	  $compData->compName = $compName;
	  $compData->compDate = $compDate;
	  $compCount += 1;
        }
      }
      else if (sizeof($compRow->find("a")) > 0) {
        $aTag = $compRow->find("a")[0];
        $link = $aTag->href;
        $text = $aTag->innertext;
        $pattern = "/(\d+)\) (\-\- Combine \-\- )?(.+)/";
        preg_match($pattern, $text, $matches, PREG_OFFSET_CAPTURE);
        if (strpos($matches[2][0], "-- Combine --") !== false) {
          continue;
        }
	$notable = true;
        $placement = (int)$matches[1][0];
        if ($placement > 6) {
	  $notable = false;
	  continue;
	}
        $eventName = $matches[3][0];
        $fullname = strtolower($fname . " " . $lname);
        getEventInfo($link, $fullname, $numRounds, $dances, $totalNumCouples, $inFinal);
        if (!$inFinal) {
	  continue;
	  $notable = false;
	}
	$points = numPoints($placement, $numRounds);
	if ($points == 0) {
	  continue;
	  $notable = false;
	}
        $level = getLevel($eventName);
        if ($level == -1) { continue; }
	if ($level == NEWCOMER) {
	  continue;
	  $notable = false;
	}
        $category = getCategory($eventName, $dances[0]);

	foreach ($dances as $dance) {
	  $eventData = new CompEvent();
	  $eventData->placement = $placement;
          $eventData->numRounds = $numRounds;
          $eventData->totalNumCouples = $totalNumCouples;
	  $eventData->points = $points;
	  $eventData->level = $level;
	  $eventData->category = $category;
	  $eventData->dance = $dance;
	  $eventData->url = $link;
	  array_push($compData->compEvents, $eventData);
	}

	if ($notable) {
	  echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Placed " . $placement . " of " . $totalNumCouples . "</b> in ";
	}
	else {
	  echo "&nbsp;&nbsp;&nbsp;&nbsp;Placed " . $placement . " of " . $totalNumCouples . " in ";
	}
	echo "<a href='" . $link . "'>" . $eventName . "</a>";
	echo " (" . $numRounds . " Rounds, ";
	echo "Level: " . $level . ", ";
	echo "Category: " . $category . ", ";
        echo "Dances: " . implode(", ",$dances) . ")";
        echo "<br />";
      }
    }
    array_push($compsData, $compData);
    $data = json_encode($compsData);
    return $data;
  }

  $fname = "";
  $lname = "";
  if (!isset($_GET["fname"])) {
    echo "require fname";
    exit;
  } else if (!isset($_GET["lname"])) {
    echo "require lname";
    exit;
  } else {
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
  }

  $startTime = microtime(true);
  echo "<h2>Results for <a href='" . getPersonO2cmUrl($fname, $lname) . "'>" . ucfirst($fname) . " " . ucfirst($lname) . "</a></h2>";

  echo "<a class='btn btn-info btn-ballroom' href='/calculator'>Enter new name</a><br />";

  echo "<div id='scoresheet'></div>";

  echo "<button id='resultToggle' type='button' style='display:none' class='btn btn-info btn-ballroom' data-toggle='collapse' data-target='#processing'>Show Results</button>";
  echo "<div id='processing' class='collapse in'>";
  $results = getResults($fname, $lname);
  $endTime = microtime(true);
  echo "<p>Took " . ($endTime - $startTime) . " seconds</p>";
  echo "</div>";
  
  echo "<script type='text/javascript' src='pointCalculator.js'></script>";
  echo "<script language='javascript'>createTable(" . $results . ")</script>";
?>
