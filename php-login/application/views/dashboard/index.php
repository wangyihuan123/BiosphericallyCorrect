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

        
        <h3>
        <!-- <img src="<?php echo URL; ?>public/img/blog_chart.jpg" width="20px" height="20px" style="margin-right: 10px "> -->
        
        <span class="glyphicon glyphicon-picture"></span>
        MY PROGRESS</h3>
        <!-- <table class="table table-hover table-bordered"> -->


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
        

    <br>
    <br>
    <section id = "EarnMorePoints">

        <h3> 
        <span class="glyphicon glyphicon-thumbs-up"></span>
        Earn More Points</h3>
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
        <br>
        <div class="container">

    <div class="row clearfix">
        <div class="col-md-8 column">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h4> DIVERSITY PROTECTION  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">242</span></h4>
                </div>
                
                <div class="panel-body">
                    <table class="table table-hover">
                
                <tbody class="info">
                <tr>
                    <td> Panel content Success </td><td> <span class="badge">12</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                <tr class="warning">
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td><td> <span class="badge">42</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                <tr class="danger">
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td><td> <span class="badge">42</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                </tbody>
            </table>
                </div>
                </div>
            </div>
        </div>


    <div class="row clearfix">
        <div class="col-md-8 column">
            <div class="panel panel-success">
                <div class="panel-heading">
                <h4> GREEN INGREDIENTS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">132</span></h4>
                </div>
                
                <div class="panel-body">
                    <table class="table table-hover">
                
                <tbody class="info">
                <tr>
                    <td> Panel content Success </td><td> <span class="badge">12</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                <tr >
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td><td> <span class="badge">42</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                <tr >
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td><td> <span class="badge">42</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                </tbody>
            </table>
                </div>
                </div>
            </div>
        </div>


    <div class="row clearfix">
        <div class="col-md-8 column">
            <div class="panel panel-warning">
                <div class="panel-heading">
                <h4> POSITIVE FUNCTIONALITY  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">22</span></h4>
                </div>
                
                <div class="panel-body">
                    <table class="table table-hover">
                
                <tbody class="info">
                <tr>
                    <td> Panel content Success </td><td> <span class="badge">12</span></td><td> <button type="button" class="btn btn-success btn-xs pull-right">Answer</button></td>
                </tr>
                <tr >
                    <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td>
                    <td> <span class="badge">11</span></td>
                    <td> <button type="button" class="btn btn-success btn-xs pull-right" ><a href="<?php echo URL . 'emp_questionnaire/index/1' ; ?> "> Anwser </a></button></td>
                </tr>
                <tr >
                    <td> link ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quae voluptatibus asperiores reiciendis recusandae, possimus impedit quisquam dicta esse sed!</td>
                    <td> <span class="badge">12</span></td>
                    <!-- <td> <button type="button" class="btn btn-success btn-xs pull-right" onclick="window.location.href('http://localhost/BiosphericallyCorrect/php-login/emp_questionnaire/index/1')">Answer</button></td> -->
                    <td> <a href="<?php echo URL . 'emp_questionnaire/index/1' ; ?>" class="btn btn-success btn-lg active btn-xs" role="button" style="text-decoration: none">Answer</a> </td>
                    </tr>
                </tbody>
            </table>
                </div>
                </div>
            </div>
        </div>

<!-- 
        <br>
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
 -->
        
    </section>

</div>
