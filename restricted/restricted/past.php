<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){
	
	//set the user
	$USER = phpCAS::getUser();
	
	//if the user has passed the command to archive a table
	if (isset($_POST['archive'])){
		$dbname = "brightk1_budget";
		##################### 
		//CONFIGURATIONS  
		#####################
		// Define the name of the backup directory

		// Set execution time limit
		if(function_exists('max_execution_time')) {
			if( ini_get('max_execution_time') > 0 ) 	set_time_limit(0) ;
		}

		###########################  
		//END  OF  CONFIGURATIONS  
		###########################

		 // Introduction information
		 $return = "";
		 $return .= "--\n";
		$return .= "-- A Mysql Backup System \n";
		$return .= "--\n";
		$return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
		$return = "--\n";
		$return .= "-- Database : " . DATABASE . "\n";
		$return .= "--\n";
		$return .= "-- --------------------------------------------------\n";
		$return .= "-- ---------------------------------------------------\n";
		$return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
		$return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
		$tables = array() ; 
		// Exploring what tables this database has
		$result = $mysqli->query('SHOW TABLES' ) ; 
		// Cycle through "$result" and put content into an array
		while ($row = $result->fetch_row()) {
			$tables[] = $row[0] ;
		}
		
		//get year of budget to name output file
		$budget_year = current(explode("_",$tables[0]));
		
		// Cycle through each  table
		 foreach($tables as $table){ 
			if($table != 'members' && $table != 'login_attempts'){
				// Get content of each table
				$result = $mysqli->query('SELECT * FROM '. $table) ; 
				// Get number of fields (columns) of each table
				$num_fields = $mysqli->field_count  ;
				// Add table information
				$return .= "--\n" ;
				$return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
				$return .= "--\n" ;
				$return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ; 
				// Get the table-shema
				$shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
				// Extract table shema 
				$tableshema = $shema->fetch_row() ; 
				// Append table-shema into code
				$return.= $tableshema[1].";" . "\n\n" ; 
				// Cycle through each table-row
				while($rowdata = $result->fetch_row()) { 
					// Prepare code that will insert data into table 
					$return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
					// Extract data of each row 
					for($i=0; $i<$num_fields; $i++){
						$return .= '"'.$rowdata[$i] . "\"," ;
					 }
					 // Let's remove the last comma 
					 $return = substr("$return", 0, -1) ; 
					 $return .= ");" ."\n" ;
				 } 
				 $return .= "\n\n" ; 
			}
		}
		// Close the connection
		$return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ; 
		$return .= 'COMMIT ; '  . "\n" ;
		$return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ;
		
		//Define the filename for the sql file
		$fileName = $budget_year .'--' . date('d-m-Y') . '@'.date('h.i.s').'.sql' ; 
		
		//write file
		$file = file_put_contents($ADMIN_FILEPATH."archive/".$fileName , $return) ; 


	}
	//if the user has passed the command to load a table
	elseif (isset($_POST['restore'])){
	
		$result = $mysqli->query('SHOW TABLES' ) ; 
		// Cycle through "$result" and put content into an array
		while ($row = $result->fetch_row()) {
			$tables[] = $row[0] ;
		}
		foreach ($tables as $table){
			if($table != 'members' && $table !='login_attempts'){
				$mysqli->query('DROP TABLE '.$table ) ; 
			}
		}
		// Restore data
		$command = "mysql -h".HOST." -u".USER." -p".PASSWORD." ".DATABASE." < archive/".$_POST['restore'];
		system($command,$return);
		//print_r($return);
	}
	elseif(isset($_POST['delete'])){
		$link = explode(".", $_POST['delete']);
		if(end($link)=='sql'){
			unlink($ADMIN_FILEPATH."archive/".$_POST['delete']);
			msg('success',"Deleted file ".$_POST['delete']." \n");
		}
		elseif(end($link)=='xlsx'){
			unlink($ADMIN_FILEPATH."excel_exports/".$_POST['delete']);
			msg('success',"Deleted file ".$_POST['delete']." \n");
		}
		else{
			msg('warning',"File extension ".end($link)." is unrecognised. Nothing done. \n");
		}
	}
	


	?>
	<head>
	<title> Archive </title>
	</head>
	<style>
	#container{
	background: #f0e7d7;
	width: 60%;
	margin: 0 auto;
	}

	</style>
	<div id="container">
	
	The archive page allows you to archive (save) a budget, including all line items and transactions. It will be stored on the serve and can be re-loaded at a later time. You can also manage excel exports from this page.
	<?php
	// query to show all the tables in the database
	$query = "SHOW TABLES FROM ".DATABASE;
	if ($result = $mysqli->query($query)) {
		if(!$result){
		  die('Could not get data: ' . $mysqli->error);
		}
		echo("<table>");
		echo("<tr><td>Current Budgets</td></tr>");
		
		//keep track of which ones we've already displayed
		$displayed = array();
		
		//iterate through all results
		while( $row = $result->fetch_array(MYSQLI_NUM)){
			if($row[0]!='members' && $row[0] != 'login_attempts' && !in_array( current( explode("_",$row[0]) ), $displayed) ){
				
				$budget_year = current(explode("_",$row[0]));
				$displayed[] = $budget_year;
			
				//give the user an option to archive that table to a file
				echo("<tr><td class='filename_cell'>".$budget_year."</td> <td class='button_cell'><form method=\"post\" onsubmit=\"return alert('The will save a copy of the budget and all transactions and will not delete it from the database.');\"><input type=\"submit\"  value=\"Archive\"><input type=\"hidden\"  name=\"archive\" value=\"".$row[0]."\"></form> </td></tr>". PHP_EOL);
			}
		}
		echo("</table>");
	}

	//show all archived budgets
	echo("Previous Budgets");
	//look through all filenames in '/archives.' folder
	$files = scandir($ADMIN_FILEPATH.'archive/');
	echo("<table>");
	foreach ($files as $file){
		//if its an actual filename
		if ($file[0] != '.'){
			//print it to the user with the option to load the table to the database
			echo("<tr><td class='filename_cell'>".$file."</td>". PHP_EOL);
			echo("<td class='button_cell'><a href='archive/".$file."' download='archive/".$file."'> <img src='site_images/download.png' Title='Download' alt='Download'></a></td>". PHP_EOL);
			echo("<td class='button_cell'><form method=\"post\" onsubmit=\"return confirm('Do you really want to restore this budget? Doing so will overwrite the current budget, including all transactions entered. Ensure that it has been archived before proceeding!');\"><input type=\"submit\"  value=\"Restore\"><input type=\"hidden\"  name=\"restore\" value=\"".$file."\"></form></td>". PHP_EOL);
		
			echo("<td class='button_cell'><form method=\"post\" onsubmit=\"return confirm('Do you really want to delete this archive? It will be gone forever!');\"><input type='image' alt='Delete?'  Title='Delete?' name='submit' src='site_images/remove.png' value='delete'><input type=\"hidden\"  name=\"delete\" value=\"".$file."\"></form></td>". PHP_EOL);
			echo("</tr>". PHP_EOL);
		}
	}
	echo("</table>");
	
	
	echo("Excel Exports");
	//look through all filenames in '/archives.' folder
	$files = scandir($ADMIN_FILEPATH.'excel_exports/');
	echo("<table>");
	foreach ($files as $file){
		//if its an actual filename
		if ($file[0] != '.') {
			//print it to the user with the option to load the table to the database
			echo("<tr><td class='filename_cell'>".$file."</td></td>". PHP_EOL);
			echo("<td class='button_cell'><a href='excel_exports/".$file."' download='excel_exports/".$file."'> <img src='site_images/download.png' Title='Download' alt='Download'></a></td>". PHP_EOL);
			echo("<td class='button_cell'><form method='post' onsubmit=\"return confirm('Do you really want to delete this export? It will be gone forever!');\"><input type='image' alt='Delete?'  Title='Delete?' name='submit' src='site_images/remove.png' value='delete'><input type='hidden'  name='delete' value='".$file."'></form></td></tr>". PHP_EOL);
		}
	}
	echo("</table>");
	?>
	</div>
	<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
	?>
