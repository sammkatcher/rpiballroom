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
	if(isset($_POST['delete'])){
		if(isset($_POST['user'])){
			$delete_query = "DELETE FROM `".$budget_year."_trans` WHERE TRANSID = ".$_POST['user'];
			$success_msg = "Deleted user. \n";
		}
		elseif(isset($_POST['trans'])){
			$delete_query = "DELETE FROM `".$budget_year."_trans` WHERE TRANSID = ".$_POST['trans'];
			$success_msg = "Deleted transaction. \n";
		}
		else{
			msg('warning',"Nothing to delete.");
		}
		if($DEBUG) msg('info',$delete_query);
		if (!$mysqli->query($delete_query)) {
			msg('error',"Errormessage: ".$mysqli->error." \n");
		}	
		else{
			msg('success',$success_msg);
		}
	}

	?>
	 <head>
	<title>User</title>
	</head>

	<div id="container">

	The Users page allows you to see who has added transactions to the budget by clicking on their name. You can delete a transaction by clicking the minus sign next to it.
	<?php
	//set user for recording who adds data
	if (isset($_GET['username'])){
		$USER = $_GET['username'];
		echo("<table>");
		//output table headers
		echo("<tr class='header'><td class='goal'> Goal </td><td class='program'> Program </td><td class='linenum'> Line # </td><td class='descrip'> Description </td><td class='quantity'> Quantity   </td><td class='unit'> Unit Price   </td><td class='total'> Total Price    </td><td class='add'>  </td><td class='user'> User    </td><td class='date'> Date   </td></tr> \n");
			
		//get trans and output them
		$trans_query = "SELECT CHANGEDATE,USER,GOAL,PROGRAM,LINECODE,UNITPRICE,DESCRIPTION,QUANTITY,LINEID,TRANSID FROM ".$budget_year."_trans WHERE USER = '$USER' ORDER BY GOAL, PROGRAM, CHANGEDATE";
		if ($trans_result = $mysqli->query($trans_query)) {

			//if nothing is returned, error
			if(!$trans_result){
			  die('Could not get data: ' . $mysqli->error);
			}
			if (($trans_row = $trans_result->num_rows > 0)){
			
				$trans_id_last = 0;
				while( $trans_row = $trans_result->fetch_array(MYSQLI_NUM)){

					//apply htmlspecialcharacters to each element in row
					$trans_row = array_map( 'htmlspecialchars', $trans_row);
					
					//assign results to variables
					list($trans_date,$trans_user,$trans_goal,$trans_program,$trans_linecode,$trans_unit_price,$trans_description,$trans_quantity,$trans_lineid,$trans_id) = $trans_row;
					
					//calc total price
					$trans_total_price = $trans_unit_price*$trans_quantity;

					//output line item data
					printf('<tr id="trans_%8$s"><td class="goal"> %1$s </td><td class="program"> %2$d</td> <td class="linenum"> %3$s</td><td class="descrip"> %4$s </td><td class="quantity"> %5$d </td><td class="unit">$ %6$.2f </td><td class="total">$ %7$.2f </td> <td class="add"><form method="post" > <input type=hidden name="trans" value="%8$d"><input value="" type="submit" name="delete" style="background-image: url(site_images/remove.png); background-color:#f0e7d7;  border: solid 0px #000000; width: 32px; height: 32px;" onclick="this.form.action=\'%11$s#trans_%12$s\';"> </form></td><td class="user"> %9$s </td><td class="date"> %10$s </td></tr>'."\n",
					$trans_goal,
					$trans_program,
					$trans_linecode,
					$trans_description,
					$trans_quantity,
					$trans_unit_price,
					$trans_total_price,
					$trans_id,
					$trans_user,
					$trans_date,
					$_SERVER['REQUEST_URI'],
					$trans_id_last);
					
					$trans_id_last = $trans_id;
				
				}
			}
			else{
				echo("<tr><td colspan=10>The user has not entered any transactions</td></tr>");
			}
		}
		echo("</table>");
		echo("</div>"); //end lone item div
	}
	else{
		$user_query = "SELECT USERNAME,ID FROM members";
		if ($user_result = $mysqli->query($user_query)) {

			//if nothing is returned, error
			if(!$user_result){
			  die('Could not get data: ' . $mysqli->error);
			}
			echo("<table> \n");
			echo("<tr><td> Username </td></tr> \n");
			while( $user_row = $user_result->fetch_array(MYSQLI_NUM)){
				$user = htmlspecialchars($user_row[0]);
				$ID = htmlspecialchars($user_row[1]);
				echo("<tr><td class='filename_cell'><a href='".$ADMIN_PATH."user&username=$user'>$user</a> </td>". PHP_EOL);
				echo("<td class='button_cell'><form method='post' onsubmit=\"return confirm('Do you really want to delete this user? It will be gone forever!');\"><input type=hidden name='user' value='$ID'><input alt='Delete User?' value='' name='delete' Title='Delete User?' type='submit' style='background-image: url(site_images/remove.png); ; background-color:#f0e7d7;  border: solid 0px #000000; width: 32px; height: 32px;'></form> </td></tr>". PHP_EOL);
			}
			echo("</table> \n");
		}
	}

?>
<div>
	<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
	?>