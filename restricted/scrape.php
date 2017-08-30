<?php
// Create DOM from URL or file
// new dom object
  $dom = new DOMDocument();

  //load the html
  $html = @$dom->loadHTMLFile('budget.htm');
  
$dom->preserveWhiteSpace = false;

$dom_tables = $dom->getElementsByTagName('table');
echo("Found data! <br /> \n");

$tables=array();
foreach ($dom_tables as $table) {
	$dom_rows = $table->getElementsByTagName('tr');
	$rows = array();
	foreach ($dom_rows as $row) {
       // $cols = $row->getElementsByTagName('td');
	   $rows[] = $row->nodeValue;
       //echo($row->nodeValue."\n");
	}
	$tables[] = $rows;
}

$rows = array_shift($tables[6]);

$num_goals = 0;
$num_programs = 0;
$goals=array();
foreach($tables[6] as $row){
	if (preg_match('/Goal [a-zA-Z]:/',$row)){
		if (!empty($programs)){
			$goals[$num_goals][] = $programs;
		}
		$num_goals++;
		$goals[$num_goals][0] = $row;
		$programs = array();
		// add a goal to the database
	}
	elseif (preg_match('/Program [0-9]:/',$row)){
		if (!empty($programs)){
			$goals[$num_goals][] = $programs;
		}
		$programs = array();
		$num_programs++;
		$programs[0]= $row;
		// add a program to the database
	}
	else{
		$programs[] = $row;
	}
}
$sql = array();
echo("Found ". count($goals) ." goals <br />\n");
echo("Found $num_programs programs <br />\n");
//print_r($tables[6]);
foreach($goals as $goal){
	echo("<h3>".$goal[0]."</h3> \n");
	$goal=array_splice($goal,1);
	foreach($goal as $program){
		echo("&nbsp; &nbsp; &nbsp; &nbsp; <h4>".$program[0]."</h4> \n");
		echo("<table>");
		echo("<tr><td> Line #</td><td> Description</td><td> Quantity</td><td> Unit Price</td><td> Total Prices</td></tr> \n");
		for ($i=3;$i<count($program)-3;$i++){
			//echo("\"".$program[$i]."\"\n");
			$re = '/(PC|[0-9A-Z]{2,3})(.+)\$([0-9,]+\.[0-9]{2})\$([0-9,]+\.[0-9]{2})/'; 
			preg_match($re, $program[$i], $matches);
			preg_match('/(\d{1,3})$/', $matches[2], $matches2);
			//print_r($matches2);
			echo("<tr> <td> $matches[1]</td><td> ".substr($matches[2],0,-strlen($matches2[1]))."</td><td> $matches2[1]</td><td> $matches[3]</td><td> ".str_replace(",","",$matches[4])."</td><td> ".str_replace(",","",$matches[5])."</td> </tr> \n");
			$sql[] = "INSERT INTO brightk1_budget (column1,column2,column3,...) VALUES (value1,value2,value3,...);";
		}
		echo("</table>");
	}
}
//print_r($goals);



?> 