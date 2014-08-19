<?php

//echo "<br>".__FILE__."<br>";

$array_category = array(
	1 => "Diversity Protection",
	2 => "Green Ingredients",
	3 => "Positive Functionality",
	4 => "Eco Processes",
	5 => "Trade integrity ");

function fooo()
{
	echo "foo<br />";

}


function display_EMP_tabel($array_emp_question, $category) {
	foreach($array_emp_question as $key => $value) {
	    if ($value->question_category == $category) {
	        echo '<div class="EarnMorePointTableRow">
	                  <div class="textOverflowEMP">'.
	                		$value->question_summary .
	        		 '</div>
		              <div class="EarnMorePointTableData"> 
		                    <p>'.
		        			$value->percent_point.
		        			'</p>    
		              </div>
		              <div class="EarnMorePointTableData">
		                    <p> 
		                        <a href="'. URL . 'emp_questionnaire/index/'. $value->question_id . ' style="font-syle:italic"> Anwser </a>
		                    </p>    
		               </div>
	            </div> ';
	    }
	}
}

function display_category_name($key)
{
	// TODO: why global not working??
	$array_category = array(
	1 => "Diversity Protection",
	2 => "Green Ingredients",
	3 => "Positive Functionality",
	4 => "Eco Processes",
	5 => "Trade integrity ");

	return $array_category[$key];
}


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
/*
	if (mysql_num_rows($result) == 0) {
	    echo "No rows found, nothing to print so am exiting";

	    //TODO:
	    exit;
	}
*/
	//$rows=mysql_fetch_array($result);
	$rows=mysql_fetch_assoc($result);
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

	//mysql_close($db);
	return $rows;
}




function display_point_total($user_id, $category_id)
{
	
	$rows = test_get_db_table_user_point($user_id, $category_id);

						//echo '<div class="tableData">'
							//echo '<p>';
				            echo '<br>'  . $rows["point"];
				            echo '</p>'; 
						echo '</div>';
						echo '<div class="tableData">';
							echo '<p>';
				            echo '<br>' . $rows["total_possible"];

}

function display_point_percentage($user_id, $category_id)
{
	
	$rows = test_get_db_table_user_point($user_id, $category_id);
			echo '<progress value="';
			echo $rows["point"];
			echo '" max="100"></progress>';
			echo $rows["point"];
			echo "/100";
				            
}

function test_get_earn_more_point($user_id, $category_id)
{
	$rows = test_get_db_table_user_point($user_id, $category_id);
	return 100 - $rows["point"];
}

// function test_get_earn_more_point_question_summary($category_id)
// {

// function test_get_db_table_user_point ($user_id, $category_id)
// {
// 	$host="localhost"; // Host name 
// 	$username="root"; // Mysql username 
// 	$password="ZpCnGva0"; // Mysql password 
// 	$db_name="test"; // Database name 
// 	$tbl_name="wp_test_user_point_new"; // Table name 

// 	// Connect to server and select databse.
// 	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
// 	mysql_select_db("$db_name")or die("cannot select DB");

// 	// get value of id that sent from address bar 
// 	//$id=$_GET['id'];
// 	$sql="SELECT * FROM $tbl_name WHERE user_id='$user_id' and category_id='$category_id'";
// 	//echo $sql;
// 	$result=mysql_query($sql);

// 	if (!$result) {
// 	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
// 	    mysql_close($db);
// 	    // TODO:
// 	    exit;
// 	}

// 	$rows=mysql_fetch_assoc($result);
// 	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
// 	//echo "<br /> result:";
// 	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

// 	//mysql_close($db);
	
// }



function test_get_db_table_global_point ($user_id)
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


	if (!$result) {
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
	    mysql_close($db);
	    // TODO:
	    exit;
	}

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
	

	echo '<h1>' . $global_point . '</h1>';

	// TODO:
	if ($global_point < 50)
	{
		echo '<h2> Generation 1 </h2>';
		// echo '<h2 style="background-color: #e5e5e5"> Generation 1 </h2>';
	}
	else
	{
		echo '<h2> Generation 2 </h2>';
	}

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
	    //echo "No rows found, nothing to print so am exiting";

	}
	//$rows=mysql_fetch_array($result);
	
	//echo "<br />".$row[0]."<br />".$row[1]."<br />".$row[2]."<br />".$row[3]."<br />";
	//echo "<br /> result:";
	//echo "user_id(".$rows["user_id"].") point:".$rows["point"].".<br />";

	//mysql_close($db);
	return $result;
	//return $rows;
}

function display_answer_radio_button_yes($question_id) {
	echo '<input width="50px" type="radio" name="answer'.$question_id.'" value="yes" checked> <span class="inputRadio">Yes </span>';
	echo '<input width="50px" type="radio" name="answer'.$question_id.'" value="no"> <span class="inputRadio">No </span>';
	echo '<input width="50px" type="radio" name="answer'.$question_id.'" value="n/a"> <span class="inputRadio">N/A </span>';

}

function display_answer_radio_button_no($question_id) {
	echo '<input type="radio" name="answer'.$question_id.'" value="yes" > <span class="inputRadio">Yes </span> ';
	echo '<input type="radio" name="answer'.$question_id.'" value="no" checked> <span class="inputRadio">No </span> ';
	echo '<input type="radio" name="answer'.$question_id.'" value="n/a"> <span class="inputRadio">N/A    ';
}

function display_answer_radio_button_na($question_id) {
	echo '<input type="radio" name="answer'.$question_id.'" value="yes"> <span class="inputRadio">Yes</span>';
	echo '<input type="radio" name="answer'.$question_id.'" value="no"> <span class="inputRadio">No</span>';
	echo '<input type="radio" name="answer'.$question_id.'" value="n/a" checked> <span class="inputRadio">N/A</span>';
}

function display_answer_radio_button_none_default($question_id) {
	echo '<input type="radio" name="answer'.$question_id.'" value="yes"> <span class="inputRadio">Yes</span>';
	echo '<input type="radio" name="answer'.$question_id.'" value="no"> <span class="inputRadio">No</span>';
	echo '<input type="radio" name="answer'.$question_id.'" value="n/a"> <span class="inputRadio">N/A</span>';
}

function display_questionnaire_table($class)
{
	echo '<div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    ASSESSMENT  
                </div>
                <div class="tableHead"> 
                    ACTION   
                </div>
            </div> ';

	$result = test_get_db_table_question($class);
	while ($rows_question=mysql_fetch_assoc($result))
	{
		// TODO: check action+description weight > 0
		echo '<div class="tableRow">';
		echo '<div class="question">';
		// echo 'question'.$rows_question['question_id'].'  '. $rows_question['question_category'].': '.$rows_question['question_content'];	
		echo $rows_question['question_content'];	
		echo '</div>';
		echo '<div class="answer"> ';

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

		echo '<br>';

		if ($rows_question['question_description_weight'] > 0) {
			echo '<p style="padding-left:0px;">'.$rows_question['question_description_caption'].'</p>';
			echo '<textarea name="answer_detail'.$rows_question['question_id'].'" style="width: 300px; height: 150px;">'.$rows_answer['description'].'</textarea>';
			
			//echo "<br>"."<br>"."answer_detail".$rows_question['question_id']."<br>";
		}
		
		echo '</div>';
		echo '</div>';
	}

	echo '</div>';
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
	
	
	// to remove the warning: mysql_close() expects parameter 1 to be resource, null given
	// mysql_close($db);
	return $result;
}

function display_question_table() {
	$result = test_get_db_table_question_all();

	while ($rows_question=mysql_fetch_assoc($result))
	{
		// TODO: check action+description weight > 0

		echo '<tr>';
		echo '<th>'.$rows_question['question_id'].'</th>';
		echo '<th>'.$rows_question['question_class'].'</th>';
		echo '<th>'.$rows_question['question_category'].'</th>';
		echo '<th>'.$rows_question['question_description_caption'].'</th>';
		echo '<th>'.$rows_question['question_content'].'</th>';
		echo '<th>'.$rows_question['question_action_weight'].'</th>';
		echo '<th>'.$rows_question['question_description_weight'].'</th>';
	}

}

?>