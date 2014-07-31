
<div class="content">
    <!-- <h2>Questionnaire!</h2>

    <?php 
        //echo out the system feedback (error and success messages)
        //$this->renderFeedbackMessages(); 
    ?>

    <p>
        This box (everything between header and footer) is the content of views/help/index.php,
        so it's the help/index view. It's rendered by the index-method within the help-controller
        (in controllers/help.php). You can easily create a sub-page by putting a method into the
        controller and a view into the view folder. So, if you want to create something like
        a FAQ section within "Help", then put
        <span style="font-weight: bold;">function faq() { $this->view->render('help/faq'); }</span>
        into controllers/help.php and create an according view in views/help/, named "faq.php".
        Now you can use that by simply navigation to "help/faq" in your app: If your app is on
        http://localhost/myapp/ then this section is now on http://localhost/myapp/help/faq !
        Try it out...
    </p>

 -->

    <!-- <section id = "requiredActions"> -->

        <h1 style="padding-left: 15px">My Assessment</h2>
        <p>Fill out the assessment below. To earn Biospherically Correct generation 2 &amp; 3, you must complete the Required Action for each level and accumulate enough points from the 100 questions.</p>

        <h1 style="padding-left: 15px">Required Action</h1>
        <p>You must complete these actions to attain a certification level.</p>
        <p>&nbsp;</p>


        <form method="post" action="<?php echo URL; ?>questionnaire/editSave/<?php 
        echo 4;
        //echo $_SESSION['user_id'];
        //echo $this->note->note_id; 
        ?>">
        <!-- <form action="BiosphericallyCorrect/handle.php" method="post"> -->

        <h3><strong>Generation 1</strong></h3>

        <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    <p style="text-align:center;">Assessment</p>    
                </div>
                <div class="tableHead"> 
                    <p style="text-align:center;">Action</p>    
                </div>
            </div>  
            <?php
                require_once (MYLIBS_PATH . 'test_common.php');
                display_questionnaire_table("BC1");
                // double is ok. display_questionnaire_table("BC1");
            ?>
        </div>  



        <br>
        <h3><strong>Generation 2</strong></h3>
        <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    <p style="text-align:center;">Assessment</p>    
                </div>
                <div class="tableHead"> 
                    <p style="text-align:center;">Action</p>    
                </div>
            </div>  
            <?php
                display_questionnaire_table("BC2");
            ?>
        </div>  


        <br>
        <h3><strong>Generation 3</strong></h3>
        <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    <p style="text-align:center;">Assessment</p>    
                </div>
                <div class="tableHead"> 
                    <p style="text-align:center;">Action</p>    
                </div>
            </div>  
            <?php
                display_questionnaire_table("BC3");
            ?>

        </div>



        <br>
        <h3><strong>General Actions </strong></h3>
        <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    <p style="text-align:center;">Assessment</p>    
                </div>
                <div class="tableHead"> 
                    <p style="text-align:center;">Actions</p>   
                </div>
            </div>  
            <?php
                display_questionnaire_table("General");
            ?>
            
        </div>

        <br>
        <input class="questionnaire" type="submit" value="Submit" />
        </form>
            

    <!-- </section> -->

</div>