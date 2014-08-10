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


    <h1>My Dashboard</h1>
    <br>

    <section id = "Dashboard">
        
        <h3>
        <img src="<?php echo URL; ?>public/img/blog_chart.jpg" width="15px" height="15px">
        MY PROGRESS</h3>
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

    <br>
    <br>
    <section id = "EarnMorePoints">
        <h2>Earn More Points</h2>
<!-- 
        <table class="tableContainerwithBorder" >
            <tr>
                <td>
                    <div class="EarnMorePointTableHead"> 
                        DIVERSITY PROTECTION
                    </div>
                </td>
                <td>
                    <div class="EarnMorePointTableHead"> 
                    <?php
                        echo test_get_earn_more_point($_SESSION['user_id'],1);
                    ?>
                    </div>
                </td>
            </tr>
        </table>
            -->
        <br><br>
        <div class="tableContainerwithBorder" >
            <div class="EarnMorePointTableHead"> 
                DIVERSITY PROTECTION <span style="padding-left: 100px"> <?php
                        echo test_get_earn_more_point($_SESSION['user_id'],1);
                    ?></span>
            </div>
            <?php 
            display_EMP_tabel($this->earnmorepoint, "Diversity protection");
            ?>
        </div>
        <br><br>
        <div class="tableContainerwithBorder" >
            <div class="EarnMorePointTableHead"> 
                GREEN INGREDIENTS <span style="padding-left: 100px"> <?php
                        echo test_get_earn_more_point($_SESSION['user_id'],2);
                    ?></span>
            </div>
            <?php 
            display_EMP_tabel($this->earnmorepoint, "Green ingredients");
            ?>
        </div>

        
    </section>

</div>
