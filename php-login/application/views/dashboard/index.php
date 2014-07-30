 <div class="content">
<!--     <h1>Dashboard</h1>

    <?php 
	    // echo out the system feedback (error and success messages)
	    $this->renderFeedbackMessages(); 
    ?>

    <h3>This is an area that's only visible for logged in users</h3>

    Try to log out, an go to /dashboard/ again. You'll be redirected to /index/ as you are not logged in.
    <br/><br/>
    You can protect a whole section in your app within the according controller (here: controllers/dashboard.php)
    by placing <span style='font-style: italic;'>Auth::handleLogin();</span> into the constructor. -->



             
    <div id="globalPoint" style = "text-align: center;">
        <p>
        My Point
        <h2>
            <?php
                require_once MYLIBS_PATH . 'test_common.php';
                display_global_point($_SESSION['user_id']);
            ?>
        </h2>
        </p>
    </div>

    <header class="MyDashboardHeader">
        <h1>My Dashboard</h1>
        <!-- <p>Hello, 
              <?php session_start(); echo $_SESSION['valid_user'];?> </p> -->
    </header>

    <br><br><br>

    

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
            $i_array = range(1, 5); 

            //display_category_name();
            //echo Session::get('user_name');

            foreach ($i_array as $i) {
            echo '<div class="tableRow">
                    <div class="tableData"> 
                        <p>'. display_category_name($i) . '</p>';
                        
                //display_point_percentage($_SESSION['user_id'],$i);
                display_point_percentage(4,$i);

                echo '</div>
                <div class="tableData"> 
                    <p> ';
                    
                display_point_total(4,$i);
                //display_point_total($_SESSION['user_id'],$i);
                //display_point_total(Session::get('user_name'),$i);
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
                            //require_once '/Users/zxl2013/Sites/BiosphericallyCorrect/myLibs/test_common.php';
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
                            //require_once '/Users/zxl2013/Sites/BiosphericallyCorrect/myLibs/test_common.php';
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

</div>
