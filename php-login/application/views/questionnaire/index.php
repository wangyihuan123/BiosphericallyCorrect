
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

        <h1>My Assessment</h2>
        <p>Fill out the assessment below. To earn Biospherically Correct generation 2 &amp; 3, you must complete the Required Action for each level and accumulate enough points from the 100 questions.</p>
        <p>&nbsp;</p>

        <h1>Required Actions</h1>
        <p>You must complete these actions to attain a certification level.</p>
        
        <form method="post" action="<?php echo URL; ?>questionnaire/editSave/<?php 
        echo 4;
        //echo $_SESSION['user_id'];
        //echo $this->note->note_id; 
        ?>">

        <h3><strong>Generation 1</strong></h3>
        <?php
            display_questionnaire_table("BC1");
        ?>

        <br>
        <h3><strong>Generation 2</strong></h3>
        <?php
            display_questionnaire_table("BC2");
        ?>

        <br>
        <h3><strong>Generation 3</strong></h3>
        <?php
            display_questionnaire_table("BC3");
        ?>

        <br>
        <h3><strong>General Actions </strong></h3>
        <?php
            display_questionnaire_table("General");
        ?>


        <br>
        <div class="row clearfix" id="producer_registration">
                <label>&nbsp;</label>
                <button type="submit">Submit </button>
            </div>
        </form>
            

    <!-- </section> -->

</div>