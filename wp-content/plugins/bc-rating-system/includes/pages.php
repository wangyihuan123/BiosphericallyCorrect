<?php

require_once ("common.php");
session_start(); 

function questionnaire()
{
	$output .= '

	<h3>Hi, <?php session_start(); echo $_SESSION["valid_user"];?> </h3>

	<div class = "test">
		<h1>My Assessment</h1>
		<p>Fill out the assessment below. To earn Biospherically Correct generation 2 &amp; 3, you must complete the Required Action for each level and accumulate enough points from the 100 questions.</p>
	</div>

	<section id = "requiredActions">

		<h1>Required Action</h1>
		<p>You must complete these actions to attain a certification level.</p>
		<p>&nbsp;</p>

		
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post" id="questionnaire_table" enctype="multipart/form-data">
		<h3><strong>Generation</strong> 1</h3>

		
		<div class="tableContainer">
			<div class="tableRow">
				<div class="tableHead"> 
					<p style="text-align:center;">Assessment</p>	
				</div>
				<div class="tableHead"> 
					<p style="text-align:center;">Action</p>	
				</div>
			</div>	'.display_questionnaire_table("BC1").'
			
		</div>	

		<br>
		<h3><strong>Generation</strong> 2</h2>
		<div class="tableContainer">
			<div class="tableRow">
				<div class="tableHead"> 
					<p style="text-align:center;">Assessment</p>	
				</div>
				<div class="tableHead"> 
					<p style="text-align:center;">Action</p>	
				</div>
			</div>'.display_questionnaire_table("BC2").'

		</div>	


		<br>
		<h3><strong>Generation</strong> 3</h2>
		<div class="tableContainer">
			<div class="tableRow">
				<div class="tableHead"> 
					<p style="text-align:center;">Assessment</p>	
				</div>
				<div class="tableHead"> 
					<p style="text-align:center;">Action</p>	
				</div>
			</div>'.display_questionnaire_table("BC3").'
		</div>



		<br>
		<h3>General Actions</h2>
		<div class="tableContainer">
			<div class="tableRow">
				<div class="tableHead"> 
					<p style="text-align:center;">Assessment</p>	
				</div>
				<div class="tableHead"> 
					<p style="text-align:center;">Actions</p>	
				</div>
			</div>	'.
				display_questionnaire_table("General").'
			
		</div>

			<br>
			<input type="submit" value="Submit" />
		</form>
			

	</section>


	';
		
	return $output;
}


function dashboard() {

?>             
    <div id="globalPoint" style = "text-align: center;">
        <p>
        My Point
        <h2>
            <?php
            	
                display_global_point($_SESSION['user_id']);
            ?>
        </h2>
        </p>
    </div>

    <header class="MyDashboardHeader">
        <!--h1>My Dashboard</h1-->
        <p>Hello, 
              <?php echo $_SESSION['valid_user'];?> </p>
    </header>

    <br><br><br>
<p>&nbsp;</p>

    

    <section id = "Dashboard">

        <h3>MY PROGRESS</h3>
        <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    CATEGORIES
                </div>
                <div class="tableHead"> 
                    MY POINTS
                </div>
                <div class="tableHead"> 
                    TOTOAL POSSIBLE
                </div>
            </div>

            <?php
            session_start();
            global $array_category;

            $i_array = range(1, 5); 

            //display_category_name();

            foreach ($i_array as $i) {
            echo '<div class="tableRow">
                    <div class="tableData"> 
                        <p>'. $array_category[$i].'</p>';
                        
                display_point_percentage($_SESSION['user_id'],$i);

                echo '</div>
                <div class="tableData"> 
                    <p> ';
                    
                display_point_total($_SESSION['user_id'],$i);
                echo '
                    </p>    
                </div>
            </div>  ';
            
            }
            ?>
            
        </div>  
        

    </section>

    
    <section id = "EarnMorePoints">
        <br>
        <br>
        <h2>Earn More Points</h2>
        <div class="tableContainer">
            <div class="tableRow">
                <div class="EarnMorePointTableHead"> 
                    Diversity protection
                </div>
            </div>
            <div class="tableRow">
                <div class="tableData"> 
                    <p>task 1</p> 

                </div>
                <div class="tableData"> 
                    <p> 
                        <?php
                            session_start();
                            echo test_get_earn_more_point($_SESSION['user_id'],1);
                        ?>
                    </p>    
                </div>
                <div class="tableData"> 
                    <p> 
                        <a href="testTask1.php"> anwser </a>
                    </p>    
                </div>
            </div>  
        <br><br>
            <div class="tableRow">
                <div class="EarnMorePointTableHead"> 
                    Green ingredients
                </div>
            </div>
            <div class="tableRow">
                <div class="tableData"> 
                    <p>task 2</p> 

                </div>
                <div class="tableData"> 
                    <p> 
                        <?php
                            session_start();
                            echo test_get_earn_more_point($_SESSION['user_id'],2);
                        ?>
                    </p>    
                </div>
                <div class="tableData"> 
                    <p> 
                        <a href="testTask2.php"> anwser </a>
                    </p>    
                </div>
            </div>  
        </div>
    </section>


<?php

}


add_shortcode('page_questionnaire', 'questionnaire');
add_shortcode('page_dashboard', 'dashboard');

?>