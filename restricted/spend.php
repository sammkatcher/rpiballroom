<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){
	
	//set the user
	$USER = phpCAS::getUser();

	//get budget year by examining table names
	$query = "SHOW TABLES FROM ".DATABASE;
	if ($result = $mysqli->query($query)) {
		if(!$result){
		  die('Could not get data: ' . $mysqli->error);
		}
		$row = $result->fetch_array(MYSQLI_NUM);
		$budget_year = current(explode("_",$row[0]));
	}
	else{
		msg('error',"Error: Could not get budget year.");
	}


	//if there is data to put in the database
	if(isset($_POST['insert'])){

		//goal of line item this trans is applied to
		$goal = filter_var($_POST['goal'],FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);	
		
		//goal of line item this trans is applied to
		$program = filter_var($_POST['program'],FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY);
		
		//union linecode of trans
		$linecode = filter_var($_POST['linecode'],FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
		
		//description of trans
		$description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);	
		
		//quantity of trans
		
		//sanitizing  as float because sanitizing as int will simply remove decimal point, not round the number to an int
		$quantity_tmp = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_REQUIRE_ARRAY); 
		
		//round the quantity
		$quantity = array_map('round',$quantity_tmp);
		
		//check if the value was rounded and let the user know if it was
		if ( count( $diffs = array_diff_assoc($quantity_tmp, $quantity) ) > 0 ){
			foreach ($diffs as $key => $diff){
				msg('warning',sprintf('Quantity must be an integer number... %.2f was rounded to %d for transaction with description: "%s" .', 
					$diff,
					round($diff),
					$description[$key]));
			}
		}
		
		$quantity_tmp = $quantity;
		//make sure the quantity is positve
		if (min($quantity) < 0){
			foreach($quantity as $key => $item){
				if($item < 0){
					$quantity[$key] = $quantity[$key] * -1;
				}
			}
		}
		
		//check if the value was changed and let the user know if it was
		if ( count( $diffs = array_diff_assoc($quantity_tmp, $quantity) ) > 0 ){
			foreach ($diffs as $key => $diff){
				msg('warning',sprintf('Quantity must be an positive number... %d was changed to %d for transaction with description: "%s" .', 
					$quantity_tmp[$key],
					$quantity[$key],
					$description[$key]));
			}
		}
		
		//unit price of trans
		$unit_price = filter_var($_POST['unit_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_REQUIRE_ARRAY);	

		// check that unit price doesnt have multiple decimal points
		list($unit_price,$warnings) = check_dec($unit_price);
		
		//line item this transactions affects
		$lineid = filter_var($_POST['lineid'],FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY); 			
		
		//loop through all the transactions received
		for ($i=0; $i < count($program); $i++){
		
			//if it has an empty quantity, unit price, or description, we can't enter it in the database
			if(!empty($quantity[$i]) && !empty($unit_price[$i]) && !empty($description[$i])){
				
				//if the check_dec filter found a problem with the unit price
				if($warnings[$i] != 0){ //unit price didn't contain correct number of decimals
				
					//tell the user
					$warning_str = sprintf('The unit price for transaction with description "%3$s" contained %2$d decimal points. All but the last one have been removed. If this was not what you intended, please delete the transaction and enter it again with only one decimal point.',
						$unit_price[$i],
						$warnings[$i]+1,
						$description[$i]);
					msg('warning',$warning_str);
				}		
				
				// compose the query to add it to the database
				$query = sprintf("INSERT INTO %s_trans (CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,DESCRIPTION,QUANTITY,UNITPRICE,LINEID) VALUES ('%s','%s','%s',%d,'%s','%s',%d,%.2f,%d);",
					$budget_year,
					EST_time(),
					$USER,
					$goal[$i],
					$program[$i],
					$linecode[$i],
					$description[$i],
					$quantity[$i],
					$unit_price[$i],
					$lineid[$i]);
				
				//if the DEBUG flags is set, show the user the query
				if($DEBUG) msg('warning',$query);

				// make the query and check for an error
				if ($result = $mysqli->query($query)) {
					if(!$result){
					  die('Error: ' . $mysqli->error);
					}
					msg('success','Added to database.');
				}
				
			}
			// if either quantity, unit price, or description was missing, tell the user why it wasn't added
			else{
				msg('error',"Warning: Missing a value for description:".$description[$i].", quantity:".$quantity[$i].", or unit_price:".$unit_price[$i]." for transaction with goal: ".$goal[$i]." program: ".$program[$i]." line code: ".$linecode[$i]." . Not added to database. Please re-enter transaction with all fields filled. ");
			}
		}
	}

	?>
	 <head>
	<title>Spend</title>
	</head>
	<script>
	function append_row(id, goal, program, linenum){

		var id_str = id.split("_");
		
		// Find a <table> element with id="myTable":
		var table = document.getElementById(id);

		// Create an empty <tr> element and add it to the 1st position of the table:
		var row = table.insertRow(-1);

		// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);

		// Add some text to the new cells:
		cell1.innerHTML = "<input readonly type=\"text\" name=\"goal[]\" size=\"2\" value=\""+goal+"\">";
		cell2.innerHTML = "<input readonly type=\"text\" name=\"program[]\" size=\"2\" value=\""+program+"\">";
		cell3.innerHTML = "<input readonly type=\"text\" name=\"linecode[]\" size=\"2\" value=\""+linenum+"\">";
		//cell4.innerHTML = "<input type=\"text\" name=\"description[]\" size=\"60\" autofocus>";
		cell4.innerHTML = "<textarea name=\"description[]\" cols=\"30\" form=\"inform\"></textarea>";
		cell5.innerHTML = "<input type=\"text\" name=\"quantity[]\" size=\"5\">";
		cell6.innerHTML = "<input type=\"text\" name=\"unit_price[]\" size=\"2\">";
		cell7.innerHTML = "$---";
		cell8.innerHTML = "<input type=\"submit\" name=\"Submit\"><input type=\"hidden\" name=\"lineid[]\" value=\""+id_str[1]+"\">";
		
		document.inform.action = '<?php echo($_SERVER['REQUEST_URI']);?>#line_'+id;
		return false;
		};
	</script>

	<style>

	table {
	display: block;
	table-layout:fixed; 
	word-wrap:break-word;
	border: 1px solid black;
	width: 100%;
	}
	</style>
	<div id="container">
	<p>The spend page allows you to add transactions to the current budget. Transaction are income/expenses that are taken from a specific budget line item. Click a plus sign under a specific goal and program to add a transaction to it. You may click the plus sign multiple times and add multiple transactions before hitting submit. The page will attempt to bring you back to the same location on the page after submitting. Watch for alert bubbles at the bottom of the screen for the status of your submission.
	<br />
	<br />
	To delete a transaction, find it on the Sort or User pages and click the minus sign next to it.
	<br />
	<br />
	This system will keep track of who adds each transaction and when. To see a list of all transactions by a user, click on their name next to a transaction or go to the Users page.
	</p>
	<?php
	$it = 0;
	// Get all info about line items
	$line_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID FROM ".$budget_year."_lines ORDER BY GOAL, PROGRAM, CHANGEDATE";
	if ($line_result = $mysqli->query($line_query)) {
		
		//if nothing is returned, error
		if(!$line_result){
		  die('Could not get data: ' . $mysqli->error);
		}
		
		//keeps track of current goal/program so can tell when next one
		$current_goal = 'Z';
		$current_program = 0;
		
		echo("<h2>".$budget_year." Budget </h2> <br /> <br />". PHP_EOL);
		echo("<form name='inform' id='inform' method='post' action='".$_SERVER['REQUEST_URI']."'>". PHP_EOL);
		//iterate through results
		while( $line_row = $line_result->fetch_array(MYSQLI_NUM)){
			$total_price = 0;
			
			//apply htmlspecialcharacters to each element in row
			$line_row = array_map('htmlspecialchars',$line_row);
			
			//assign results to variables,
			list($line_date,$line_user,$line_goal,$line_program,$line_linecode,$line_unit_price,$line_description,$line_quantity,$line_lineid) = $line_row;
			
			//calculate totoal price
			$line_total_price = $line_unit_price*$line_quantity;
		
			//add to total price for program
			$total_price += $line_total_price;
			
			//if this line item is a new goal, print a header for the new goal
			if ($line_goal != $current_goal){
				echo("<h3> Goal ".$line_goal."</h3>". PHP_EOL);
				$current_goal=$line_goal;
				$current_program = 0;
				$program_total_price = 0;
			}
			
			//if this line item is a new program, print a header for the new program
			if ($line_program != $current_program){
				echo("<h4> Program ".$line_program."</h4>". PHP_EOL);
				$current_program = $line_program;
			}
			
			echo("<div class=\"line_item\">". PHP_EOL); ///start line item div
			echo("<table id='item_".$line_lineid."'>". PHP_EOL);
			
			//output table headers
			printf('<tr class="header" id="line_item_%1$d"> '. PHP_EOL .'<td class="goal"> Goal </td>'. PHP_EOL .'<td class="program"> Program </td>'. PHP_EOL .'<td class="linenum"> Line # </td>'. PHP_EOL .'<td class="descrip"> Description </td>'. PHP_EOL .'<td class="quantity"> Quantity   </td>'. PHP_EOL .'<td class="unit"> Unit Price   </td>'. PHP_EOL .'<td class="total"> Total Price    </td>'. PHP_EOL .'<td class="add">  </td>'. PHP_EOL .'<td class="user"> User    </td>'. PHP_EOL .'<td class="date"> Date   </td>'. PHP_EOL .'</tr>' . PHP_EOL,
				$line_lineid);
			
			//output line item data
			printf('<tr ><td class="goal"> %1$s</td>'. PHP_EOL .'<td class="program"> %2$d</td>'. PHP_EOL .'<td class="linenum"> %3$s </td>'. PHP_EOL .'<td class="descrip"> %4$s </td>'. PHP_EOL .'<td class="quantity"> %5$d </td>'. PHP_EOL .'<td class="unit">$ %6$s </td>'. PHP_EOL .'<td  class="total">$ %7$s </td>'. PHP_EOL .'<td class="add"> <a onclick=\'append_row("item_%8$d","%1$s",%2$d,"%3$s");return false;\' href="#" ><img src="site_images/plus.png" alt="+"></a> </td>'. PHP_EOL .'<td class="user"> %9$s </td>'. PHP_EOL .'<td class="date"> %10$s </td>'. PHP_EOL .'</tr>'." \n",
				$line_goal,
				$line_program,
				$line_linecode,
				$line_description,
				$line_quantity,
				number_format($line_unit_price, 2, '.', ','),
				number_format($line_total_price, 2, '.', ','),
				$line_lineid,
				$line_user ,
				$line_date);
			
			
			//get trans and output them
			$trans_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID,TRANSID FROM ".$budget_year."_trans WHERE LINEID=$line_lineid ORDER BY GOAL, PROGRAM, CHANGEDATE";
			if ($trans_result = $mysqli->query($trans_query)) {

				//if nothing is returned, error
				if(!$trans_result){
				  die('Could not get data: ' . $mysqli->error);
				}
				while( $trans_row = $trans_result->fetch_array(MYSQLI_NUM)){
		
					
					//assign results to variables,
					list($trans_date,$trans_user,$trans_goal,$trans_program,$trans_linecode,$trans_unit_price,$trans_description,$trans_quantity,$trans_lineid) = $trans_row;
		
					//calc total price for trans
					$trans_total_price = $trans_unit_price*$trans_quantity;

					//subtract from total for program
					$total_price -= $trans_total_price;
					//output line item data
					printf('<tr><td class="goal"> %1$s</td>'. PHP_EOL .'<td class="program"> %2$d</td>'. PHP_EOL .'<td class="linenum"> %3$s</td>'. PHP_EOL .'<td class="descrip"> %4$s </td>'. PHP_EOL .'<td class="quantity"> %5$d </td>'. PHP_EOL .'<td class="unit">$ %6$s </td>'. PHP_EOL .'<td class="total">$ %7$s </td>'. PHP_EOL .'<td class="add"> <a onclick=\'append_row("item_%8$d","%1$s",%2$d,"%3$s");return false;\' href="#" ><img src="site_images/plus.png" alt="+"></a> </td>'. PHP_EOL .'<td class="user"> <a href="%11$suser&username=%9$s"> %9$s </a></td>'. PHP_EOL .'<td class="date"> %10$s </td>'. PHP_EOL .'</tr>'." \n",
					$trans_goal,
					$trans_program,
					$trans_linecode,
					$trans_description,
					$trans_quantity,
					number_format($trans_unit_price, 2, '.', ','),
					number_format($trans_total_price, 2, '.', ','),
					$trans_lineid,
					$trans_user,
					$trans_date,
					$ADMIN_PATH);
				
				}
			}
			printf('<tr class="total"><td></td> <td></td><td></td><td></td><td></td><td><b>Total</b></td><td>$ %s</td><td></td><td></td><td></td></tr>'. PHP_EOL,number_format($total_price, 2, '.', ','));
			echo("</table>". PHP_EOL);
			echo("</div>". PHP_EOL); //end lone item div
			$it++;
		}
		//hidden input so this page can check wether data was submitted which it should add to the DB
		echo("<input type=\"hidden\" name=\"insert\" value=\"update\">");
		echo("</form>");
		/* free result set */
	}
?>
	<div>
<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}

	?>