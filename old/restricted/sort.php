<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){


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

	//if the delete flag is set
	if(isset($_POST['delete'])){
		$delete_query = "DELETE FROM `".$budget_year."_trans` WHERE TRANSID = ".$_POST['delete'];
		
		//display query if debugging
		if($DEBUG) msg('info',$delete_query);
		
		if (!$mysqli->query($delete_query)) {
			msg('error',"Errormessage: ".$mysqli->error." \n");
		}	
		else{
			msg('success',"Deleted transaction. \n");
		}
	}

	?>
	 <head>
	<title>Sort</title>
	</head>

	<div id="container">

	The sort page allows you to search and sort transactions by a number of different properties. Enter a sort criteria and an ordering and click sort to display them in that order. Enter a search term and click search to get a list of all transactions with those words in their descriptions. You may delete a transaction by clicking the minus sign next to it.
	<br />
	<?php
	$sortable = ['Date' => 'CHANGEDATE',
			'User' => 'USER',
			'Goal' => 'GOAL',
			'Program' => 'PROGRAM',
			'Line Code' => 'LINECODE',
			'Unit_Price' => 'UNITPRICE',
			'Quantity' => 'QUANTITY'
		];
	$order = ['Ascending' => 'ASC', 'Descending' => 'DESC'];

	if (isset($_GET['sort'])){
		$sort_input = filter_var($_GET['sort'], FILTER_SANITIZE_STRING);
		if(in_array($sort_input,array_keys($sortable))){
			$SORT = $sortable[$sort_input];
		}
	}
	if (isset($_GET['order'])){
		$order_input = filter_var($_GET['order'], FILTER_SANITIZE_STRING);
		if(in_array($order_input,array_keys($order))){
			$ORDER = $order[$order_input];
		}
	}

	echo('Sort By:');
	echo('<form id="sort_form" method="get"> <select name="sort" form="sort_form">'. PHP_EOL);
	

	
	//display the sorting options in the form
	foreach($sortable as $key => $value) {
		echo("<option ");
		if(isset($SORT)){
			if ($SORT == $value){
				echo('selected =selected ');
			}
		}
		echo("value='$key'> $key </option> ". PHP_EOL);
	}
	echo('</select> <select form="sort_form" name="order"> '. PHP_EOL);

	//display the order options in the form
	foreach($order as $key => $value) {
		echo("<option ");
		if(isset($ORDER)){
			if ($ORDER == $value){
				echo('selected =selected ');
			}
		}
		echo("value='$key'> $key </option> ". PHP_EOL);
	}
	echo('</select>');
	//hidden input to make sure we come back to this page
	echo('<input type="hidden" name="admin" value="sort" >'. PHP_EOL);
	echo('<input type="submit" value="Sort"></form>'."\n". PHP_EOL);

	echo('<form id="search_form" method="get">'."\n". PHP_EOL);
	echo('<input type="hidden" name="admin" value="sort" >'. PHP_EOL);
	echo('<input type="text" name="search">'."\n". PHP_EOL);
	echo('<input type="submit" value="Search"></form>'."\n". PHP_EOL);

	//if the sorting variables aren't set, use the defaults
	if (!isset($SORT)){
		$SORT = $sortable['Date'];
	}

	if (!isset($ORDER)){
		$ORDER = $order['Ascending'];
	}



	

	echo("<table>");

	//output table headers
	echo("<tr class='header'><td class='goal'> Goal </td>". PHP_EOL ."<td class='program'> Program </td>". PHP_EOL ."<td class='linenum'> Line # </td>". PHP_EOL ."<td class='descrip'> Description </td>". PHP_EOL ."<td class='quantity'> Quantity   </td>". PHP_EOL ."<td class='unit'> Unit Price   </td>". PHP_EOL ."<td class='total'> Total Price    </td>". PHP_EOL ."<td class='add'>  </td>". PHP_EOL ."<td class='user'> User    </td>". PHP_EOL ."<td class='date'> Date   </td>". PHP_EOL ."</tr> \n");
		
	//if no search entered, get transactions and output them
	$trans_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID,TRANSID FROM ".$budget_year."_trans ORDER BY $SORT $ORDER";
	$query = $trans_query;

	//if a search is defined, search it
	if(isset($_GET['search'])){
		if (!empty($_GET['search'])){
		
			//filter the user input for special characters
			$search = filter_var($_GET['search'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			
			$search_query = sprintf('SELECT CHANGEDATE, USER, GOAL, PROGRAM, LINECODE, UNITPRICE, DESCRIPTION, QUANTITY, LINEID, TRANSID, MATCH (DESCRIPTION) AGAINST (\'%1$s\') AS score FROM  `%2$s_trans` WHERE MATCH (DESCRIPTION) AGAINST (\'%1$s\') ORDER BY score DESC',$search,$budget_year);
			
			$query = $search_query;
		}
	}

	//if debug mode is on, display query
	if ($DEBUG) msg('info',$query);

	// if the query is successful
	if ($trans_result = $mysqli->query($query)) {

		//if nothing is returned, error
		if(!$trans_result){
		  die('Could not get data: ' . $mysqli->error);
		}
		if ($trans_result->num_rows > 0 ){
			while( $trans_row = $trans_result->fetch_array(MYSQLI_NUM)){

				//apply htmlspecialchar to each returned element
				$trans_row = array_map( 'htmlspecialchars', $trans_row);
				
				//assign results to variables,
				list($trans_date,$trans_user,$trans_goal,$trans_program,$trans_linecode,$trans_unit_price,$trans_description,$trans_quantity,$trans_lineid,$trans_id) = $trans_row;
		
				$trans_total_price = $trans_unit_price*$trans_quantity;

				//output line item data
				echo("<form method=\"post\">". PHP_EOL);
				printf('<tr><td class="goal"> %1$s </td>'. PHP_EOL .'<td class="program"> %2$d</td>'. PHP_EOL .'<td class="linenum"> %3$s</td>'. PHP_EOL .'<td class="descrip"> %4$s </td>'. PHP_EOL .'<td class="quantity"> %5$d </td><td class="unit">$ %6$.2f </td>'. PHP_EOL .'<td class="total">$ %7$.2f </td>'. PHP_EOL .'<td class="add"> <input type=hidden name="delete" value="%8$d"><input type="image" src="site_images/remove.png" alt="-"> </td>'. PHP_EOL .'<td class="user"> %9$s </td>'. PHP_EOL .'<td class="date"> %10$s </td>'. PHP_EOL .'</tr>'. PHP_EOL ,
					$trans_goal,
					$trans_program,
					$trans_linecode,
					$trans_description,
					$trans_quantity,
					$trans_unit_price,
					$trans_total_price,
					$trans_id,
					$trans_user,
					$trans_date
				);
				echo('</form>'. PHP_EOL);
			}
			
		}
		else{
			if(isset($search)){
				echo("<tr><td colspan=10>There were no transactions returned with that search.</td></tr>". PHP_EOL);
			}
			else{
				echo("<tr><td colspan=10>There are no transactions to sort.</td></tr>". PHP_EOL);
			}
			
		}
		
	}

	echo("</table>");
	echo("</div>"); //end lone item div


?>
	<div>
<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
	?>