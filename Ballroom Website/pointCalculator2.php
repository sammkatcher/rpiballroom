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
    $url = getPersonO2cmUrl($firstName, $lastName);
    $urlHTML = file_get_contents($url);
    return str_get_html($urlHTML);
  }

  function getCompO2cmPage( $code ) {
    $url = "http://results.o2cm.com/event3.asp";
    $ch = curl_init();
    $fields_string = "selDiv=&selAge=&selSkl=&selSty=&selEnt=&submit=OK&event=" . $code;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    $result = curl_exec($ch);
    curl_close($ch);
    return str_get_html($result);
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
      return -1;
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
      if (sizeof($bTags) == 0) {
	continue;
      }
      $aTags = $compRow->parent()->next_sibling()->find("a");
      if (sizeof($aTags) == 0) {
	continue;
      }
      $eventUrl = $aTags[0]->href;
      $pattern = "/event=(...\d\d?)/";
      preg_match($pattern, $eventUrl, $matches, PREG_OFFSET_CAPTURE);
      if (sizeof($matches) < 1) {
	continue;
      }
      $eventCode = $matches[1][0];
      echo $eventCode . "<br />";
      $compPage = getCompO2cmPage($eventCode);
      
      array_push($compsData, $compData);
    }
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
  echo "<h2>Results for <a href='" . getPersonO2cmUrl($fname, $lname) . "'>" . ucfirst($fname) . " " . ucfirst($lname) . "</a></h2><br />";

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
