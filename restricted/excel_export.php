<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated()){

$USER = "scraper";
$query = "SHOW TABLES FROM ".DATABASE;
if ($result = $mysqli->query($query)) {
	if(!$result){
	  die('Could not get data: ' . $mysqli->error);
	}
	$row = $result->fetch_array(MYSQLI_NUM);
	$budget_year = current(explode("_",$row[0]));
}
else{
	error("Error: Could not get budget year.");
}
?>
<div id="container">

<!-- Form to allow user to input number of extra rows to print for each line item-->
<form action="excel_export.php" method="get">
Number of extra rows per line item: <input type="text" name="rows" size="5"><br>
<input type="submit" value="Submit">
<form>
<br />
<br />
<hr>
<?php


// if the user has specified a number of rows
if (isset($_GET["rows"])){
	//check that its actually a number
	if (is_numeric($_GET["rows"])){
		//if its more than 20, only print 20
		if ($_GET["rows"]>20 ) {
			echo("Number of extra lines greater than max of  20, using 20... <br /> \n");
			$extra_rows = 20;
		}
		//if its less than 0, don't print any
		elseif($_GET["rows"]<0){
			echo("Number of extra lines less than min of 0, using 0... <br /> \n");
			$extra_rows = 0;
		}
		//if its within the range, print the requested number
		else {
			echo("Number of extra lines specified... using ".$_GET["rows"]."...<br /> \n");
			$extra_rows = $_GET["rows"];
		}
	}
	//if its nbot a number, output an error and use the default
	else{
		echo("Value is non-numeric, using defualt of 3... <br /> \n");
	}
}
//number of rows hasnt been specified, use 3
else{
	echo("Number of extra lines not specified... using 3...<br /> \n");
	$extra_rows = 3;
}

/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
//ini_set('include_path', ini_get('include_path').';../home4/brightk1/public_html/budget/Classes/');
ini_set('include_path', ini_get('include_path').':/home/ballroom/public_html/restricted/Classes/');

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
echo date('H:i:s') . " Create new PHPExcel object <br />\n";
$objPHPExcel = new PHPExcel();

// Set properties of file
echo date('H:i:s') . " Set properties<br />\n";
$objPHPExcel->getProperties()->setCreator("Budget Website");
$objPHPExcel->getProperties()->setLastModifiedBy("Budget Website");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Budget.");

//sheet object
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

//keep track of which row we're at in excel sheet
$line = 0;

//define a line iutem header
$line_header = array("Goal","Program","Line #","Description","Quantity","Unit Price","Total Price");

//echo to user
echo(date('H:i:s') . " Retrieving Data... <br />\n");

//set format of cells with money values
$sheet->getStyle('F:G')->getNumberFormat()->setFormatCode("$#,##0.00");

//get all line item data from 
$line_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID FROM ".$budget_year."_lines ORDER BY GOAL, PROGRAM, CHANGEDATE";
if ($line_result = $mysqli->query($line_query)) {
	//if no results returned, errors
	if(!$line_result){
	  die('Could not get data: ' . $mysqli->error);
	}
	//keep track of current goal/program so that we can tell when the next one starts
	$current_goal = 0;
	$current_program = 0;
	//echo to users
	echo(date('H:i:s') . " Writing Data... <br />\n");
	//loop through results
	while( $row = $line_result->fetch_array(MYSQLI_NUM)){
	
		//apply htmlspecialcharacters to each element in row
		$row = array_map('htmlspecialchars', $row);
		
		//assign results to variables,
		list($line_date,$line_user,$line_goal,$line_program,$line_linecode,$line_unit_price,$line_description,$line_quantity,$line_lineid) = $row;
		
		//calc total price
		$line_total_price = $line_unit_price*$line_quantity;
		
		//if new goal, output goal header
		if ($line_goal != $current_goal){
			echo(date('H:i:s') . " Writing Goal $line_goal... <br />\n");
			$line++;
			$sheet->SetCellValue('A'.$line, "Goal ".$line_goal);
			$current_goal=$line_goal;
			$sheet->getStyle('A'.$line)->getFont()->setBold(true);
			$line++;
		}
		//if new program, output program header
		if ($line_program != $current_program){
			$line++;
			$sheet->SetCellValue('A'.$line, "Program ".$line_program);
			$current_program = $line_program;
			$sheet->getStyle('A'.$line)->getFont()->setBold(true);
			$line++;
		}
		
		//output table headers
		$line_item = array($line_goal,$line_program,$line_linecode,$line_description,$line_quantity,$line_unit_price);
		$lineem_template = array($line_goal,$line_program,$line_linecode);
		
		// Add some data
		//echo date('H:i:s') . " Add some data to row $line <br />\n";
		
		//output headers
		$sheet->fromArray($line_header, NULL, 'A'.$line);
		$line++;
		
		//keep track of where items started for formulas
		$start_of_items = $line;
		
		//write the line item
		$sheet->fromArray($line_item, NULL, 'A'.$line);
		
		//calculate the total price
		$sheet->setCellValue("G".$line, "=E$line*F$line");
		$line++;
		
		//get trans and output them
		$trans_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID,TRANSID FROM ".$budget_year."_trans WHERE LINEID=$line_lineid ORDER BY GOAL, PROGRAM, CHANGEDATE";
		if ($trans_result = $mysqli->query($trans_query)) {

			//if nothing is returned, error
			if(!$trans_result){
			  die('Could not get data: ' . $mysqli->error);
			}
			while( $trans_row = $trans_result->fetch_array(MYSQLI_NUM)){
	
				//assign results to variables, and decode them
				$trans_date = htmlspecialchars($trans_row[0]);
				$trans_user = htmlspecialchars($trans_row[1]);
				$trans_goal = htmlspecialchars($trans_row[2]);
				$trans_program = htmlspecialchars($trans_row[3]);
				$trans_linecode = htmlspecialchars($trans_row[4]);
				$trans_description = htmlspecialchars($trans_row[6]);
				$trans_quantity =  htmlspecialchars($trans_row[7]);
				$trans_unit_price = htmlspecialchars($trans_row[5]);
				$trans_total_price = $trans_unit_price*$trans_quantity;
				$trans_lineid = htmlspecialchars($trans_row[8]);
				$trans_total_price -= $trans_total_price;
				//output line item data
				$trans_item = array($trans_goal,$trans_program,$trans_linecode,$trans_description,$trans_quantity,$trans_unit_price);
				
				//write the trans
				$sheet->fromArray($trans_item, NULL, 'A'.$line);
				
				//calculate the total price
				$sheet->setCellValue("G".$line, "=E$line*F$line");
				$line++;
			}
		}
		
		
		//output number of extra rows desired
		for($i=0;$i<$extra_rows;$i++){
			$sheet->fromArray($lineem_template, NULL, 'A'.$line);
			$sheet->setCellValue("G".$line, "=E$line*F$line");
			$line++;
		}
		
		//output summary formulas
		$sheet->setCellValue("F".$line, "Total");
		$sheet->setCellValue("G".$line, "=G". $start_of_items ."-SUM(G". ($start_of_items+1) .":G". ($line-2) .")");
		$line++;
		$line++;
	}

}

echo date('H:i:s') . " Setting formatting... <br />\n";


foreach (range("A", "G") as $letter) {
   $sheet->getColumnDimension($letter)->setAutoSize(true);
}

// Rename sheet
echo date('H:i:s') . " Renaming sheet... <br />\n";
$sheet->setTitle('Simple');

		
// Save Excel 2007 file
$outfile_name = $ADMIN_FILEPATH.'excel_exports/'.$budget_year .'--' . date('d-m-Y') . '@'.date('h_i_s').'.xlsx';
echo date('H:i:s') . " Writing to Excel2007 format...<br />\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save($outfile_name);

// Echo done
$link = explode("/", $outfile_name);
echo(date('H:i:s') . " Done writing to file: <a href='". $outfile_name . "' >". end($link)."</a>.<br />\r\n");

?>
</div>
	<?php
}
else{
	msg('error','You are not authorized to access this page, please <a href="login.php">login</a>.');
}
	?>