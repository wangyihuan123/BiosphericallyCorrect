<?php
/*
//echo "<br>".__FILE__."<br>";
$array_category = array(
	1 => "Diversity Protection",
	2 => "Green Ingredients",
	3 => "Positive Functionality",
	4 => "Eco Processes",
	5 => "Trade integrity ");

function test_get_db_table_user_point ($user_id, $category_id)
{
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="ZpCnGva0"; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="wp_test_user_point_new"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar 
	//$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE user_id='$user_id' and category_id='$category_id'";
	//echo $sql;
	$result=mysql_query($sql);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
	    mysql_close($db);
	    // TODO:
	    exit;
	}

	// if (mysql_num_rows($result) == 0) {
	//     echo "No rows found, nothing to print so am exiting";

	//     //TODO:
	//     exit;
	// }

	//$rows=mysql_fetch_array($result);
	$rows=mysql_fetch_assoc($result);
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

	mysql_close($db);
	return $rows;
}




function display_point_total($user_id, $category_id)
{
	
	$rows = test_get_db_table_user_point($user_id, $category_id);

						//echo '<div class="tableData">'
							//echo '<p>';
	
 //        echo $rows["point"];
 //        echo '</p>'; 
	// echo '</div>';
	// echo '<div class="tableData">';
	// 	echo '<p>';
 //        echo $rows["total_possible"];
        
	$output .= $rows["point"].'</p>
		</div>
	<div class="tableData">
		<p>'.$rows["total_possible"];		

	return $output;	            

}

function display_point_percentage($user_id, $category_id)
{
	
	$rows = test_get_db_table_user_point($user_id, $category_id);
	//$output .= '<progress value="'.$rows["point"].'" max="100"></progress>'.$rows["point"].'/100';
	echo '<progress value="'.$rows["point"].'" max="100"></progress>'.$rows["point"].'/100';
	return $output;	            
}

function test_get_earn_more_point($user_id, $category_id)
{
	$rows = test_get_db_table_user_point($user_id, $category_id);
	return 100 - $rows["point"];
}


function test_get_db_table_global_point ($user_id, $category_id)
{
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="ZpCnGva0"; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="wp_test_user_point_new"; // Table name 

	// Connect to server and select databse.
	$db = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar 
	//$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE user_id='$user_id' and category_id!=6";
	//echo $sql;
	$result=mysql_query($sql);

	mysql_close($db);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
	    mysql_close($db);
	    // TODO:
	    exit;
	}

	// if (mysql_num_rows($result) == 0) {
	//     echo "No rows found, nothing to print so am exiting";

	//     //TODO:
	//     exit;
	// }

	mysql_close($db);
	return $result;
}

function display_global_point ($user_id)
{
	$global_point = 0;
	$result = test_get_db_table_global_point($user_id);

	//$rows=mysql_fetch_array($result);
	while ($rows = mysql_fetch_assoc($result))
	{
		//echo "<br /> rows:";
		//echo "user_id(".$rows["user_id"].") category_id(".$rows["category_id"]." point:".$rows["point"].".<br />";

		$global_point += $rows["point"];
	}
	

	// echo $global_point;

	// // TODO:
	// if ($global_point < 50)
	// {
	// 	echo "<br /><br /> Generation 1";
	// }
	// else
	// {
	// 	echo "<br /> Generation 2";
	// }

	$output .= $global_point;

	// TODO:
	if ($global_point < 50)
	{
		$output .= "<br /><br /> Generation 1";
	}
	else
	{
		$output .= "<br /> Generation 2";
	}

	//return $output;
	echo $output;
}



function test_get_db_table_answer ($user_id, $question_id)
{
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="ZpCnGva0"; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="wp_test_answer"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar 
	//$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE user_id='$user_id' and question_id='$question_id'";
	//echo $sql;
	$result=mysql_query($sql);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();

	    // TODO:
	    mysql_close($db);
	    exit;
	}

	//$rows=mysql_fetch_array($result);
	$rows=mysql_fetch_assoc($result);
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

	//mysql_close($db);
	return $rows;
}

function test_get_db_table_question ($class)
{
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="ZpCnGva0"; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="wp_test_question"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar 
	//$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE question_class='$class'";
	//echo $sql;
	$result=mysql_query($sql);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();

	    // TODO:
	    mysql_close($db);
	    exit;
	}

	if (mysql_num_rows($result) == 0) {
	    echo "No rows found, nothing to print so am exiting";

	    //TODO:
	    mysql_close($db);
	    exit;
	}
	//$rows=mysql_fetch_array($result);
	
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

	//mysql_close($db);
	return $result;
	//return $rows;
}


// function display_answer_radio_button_yes($question_id) {
// 	echo '<input type="radio" name="answer'.$question_id.'" value="yes" checked> Yes';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="no"> No';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';

// }

// function display_answer_radio_button_no($question_id) {
// 	echo '<input type="radio" name="answer'.$question_id.'" value="yes" > Yes';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="no" checked> No';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';
// }

// function display_answer_radio_button_na($question_id) {
// 	echo '<input type="radio" name="answer'.$question_id.'" value="yes"> Yes';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="no"> No';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="n/a" checked> N/A';
// }

// function display_answer_radio_button_none_default($question_id) {
// 	echo '<input type="radio" name="answer'.$question_id.'" value="yes"> Yes';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="no"> No';
// 	echo '<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';
// }



function display_answer_radio_button_yes($question_id) {
	return '<input type="radio" name="answer'.$question_id.'" value="yes" checked> Yes'.
	'<input type="radio" name="answer'.$question_id.'" value="no"> No'.
	'<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';

}

function display_answer_radio_button_no($question_id) {
	return '<input type="radio" name="answer'.$question_id.'" value="yes" > Yes'
	.'<input type="radio" name="answer'.$question_id.'" value="no" checked> No'
	.'<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';
}

function display_answer_radio_button_na($question_id) {
	return '<input type="radio" name="answer'.$question_id.'" value="yes"> Yes'
	.'<input type="radio" name="answer'.$question_id.'" value="no"> No'
	.'<input type="radio" name="answer'.$question_id.'" value="n/a" checked> N/A';
}

function display_answer_radio_button_none_default($question_id) {
	return '<input type="radio" name="answer'.$question_id.'" value="yes"> Yes'
	.'<input type="radio" name="answer'.$question_id.'" value="no"> No'
	.'<input type="radio" name="answer'.$question_id.'" value="n/a"> N/A';
}


function display_questionnaire_table($class)
{
	session_start();

	$result = test_get_db_table_question($class);
	while ($rows_question=mysql_fetch_assoc($result))
	{
		// TODO: check action+description weight > 0
		$output .= '<div class="tableRow">';
		$output .= '<div class="question">';
		$output .= '<p> question'.$rows_question['question_id'].'  '. $rows_question['question_category'].': '.$rows_question['question_content'].'</p>';	
		$output .= '</div>';
		$output .= '<div class="answer"> ';

		//$rows_answer = test_get_db_table_answer($_POST['user_id'], $rows_question['question_id']);
		$rows_answer = test_get_db_table_answer(4, $rows_question['question_id']);

		if ($rows_answer['action'] == 'yes') {
			display_answer_radio_button_yes($rows_question['question_id']);
		} else if ($rows_answer['action'] == 'no') {
			display_answer_radio_button_no($rows_question['question_id']);
		} else if ($rows_answer['action'] == 'na') {
			display_answer_radio_button_na($rows_question['question_id']);
		} else {
			//
			display_answer_radio_button_none_default($rows_question['question_id']);
		}

		$output .= '<br>';

		if ($rows_question['question_description_weight'] > 0) {
			$output .= '<p>'.$rows_question['question_description_caption'].'</p>';
			$output .= '<textarea name="answer_detail'.$rows_question['question_id'].'" style="width: 300px; height: 150px;">'.$rows_answer['description'].'</textarea>';
			
			//$output .= "<br>"."<br>"."answer_detail".$rows_question['question_id']."<br>";
		}
		
		$output .= '</div>';
		$output .= '</div>';
	}

	return $output;
}


function test_get_db_table_question_all(){
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="ZpCnGva0"; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="wp_test_question"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar 
	//$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name";
	//echo $sql;
	$result=mysql_query($sql);

	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();

	    // TODO:
	    mysql_close($db);
	    exit;
	}

	//$rows=mysql_fetch_array($result);
	
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";
	mysql_close($db);
	return $result;
}

function display_question_table() {
	$result = test_get_db_table_question_all();

	while ($rows_question=mysql_fetch_assoc($result))
	{
		// TODO: check action+description weight > 0

		$output .= '<tr>';
		$output .= '<th>'.$rows_question['question_id'].'</th>';
		$output .= '<th>'.$rows_question['question_class'].'</th>';
		$output .= '<th>'.$rows_question['question_category'].'</th>';
		$output .= '<th>'.$rows_question['question_description_caption'].'</th>';
		$output .= '<th>'.$rows_question['question_content'].'</th>';
		$output .= '<th>'.$rows_question['question_action_weight'].'</th>';
		$output .= '<th>'.$rows_question['question_description_weight'].'</th>';
	}

	return $output;
}
*/
?>