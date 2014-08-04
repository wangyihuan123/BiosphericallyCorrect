 <div class="content">
    <?php if ($this->emp_questionnaire) :  ?>

    <div class="EMP_totalPoint">
            <p>POINTS TOTAL</p>
            <h1>
                <?php
                    echo $this->emp_questionnaire->percent_point;
                    ?>
            </h1>
        </div>

    <div class = "test">
        <h1>Diversity protection</h1>
        <p><?php  echo $this->emp_questionnaire->question_summary; ?></p>
    </div>

<p>&nbsp;</p>

    <section id = "EarnMorePointDiversityProtection">
        
        <!-- <div class="tableContainer">
            <div class="tableRow">
                <div class="tableHead"> 
                    <p>INVESTMENT</p>   
                </div>
                <div class="tableHead"> 
                    <p>EFFORT LEVEL</p>   
                </div>
                <div class="tableHead"> 
                    <p>SOCIAL BENEFIT</p>   
                </div>
                <div class="tableHead"> 
                    <p>ENVIRONMENT BENEFIT</p>   
                </div>
            </div>  
            <div class="tableRow">
                <div class="tableData"> 
                    4
                </div>
                <div class="tableData"> 
                    3
                </div>
                <div class="tableData"> 
                    3
                </div>
                <div class="tableData"> 
                    4
                </div>
            </div>  
            
        </div>   -->
        <br>
        <div class = "EMP_content">
            <div class = "EMP_fullDescription">
                <h3> FULL DESCRIPTION </h3>
                <p><?php echo $this->emp_questionnaire->full_description; ?></p>
            </div>

            <div class = "EMP_stepsHint">
                <p><?php echo $this->emp_questionnaire->step_hint; ?></p>
            </div>
            <div class = "EMP_KeySteps">
                <h3> Key Steps </h3>
                <ul> 
                    <li><?php echo $this->emp_questionnaire->key_steps; ?></li> 
                </ul> 
                <p> </p>
            </div>
            <div class = "EMP_resource">
                <h3>RESOURCE</h3>
                <p> <?php echo $this->emp_questionnaire->resource; ?></p>
            </div>
            <div>
                <h3> To complete this initiative, you must answer the following question: </h3>
                <p><?php echo $this->emp_questionnaire->percent_caption; ?> </p>

                <form method="post" action="<?php echo URL; ?>earnmorepoint/editSave/<?php 
                echo $_SESSION['user_id'];
                //echo $this->note->note_id; 
                ?>">
                <!-- <form action="BiosphericallyCorrect/handle.php" method="POST"> -->
                    <select name='task1_process' style="margin-left: 50px">
                        <option>0~25%</option>
                        <option>25~50%</option>
                        <option>50~75%</option>
                        <option>75~100%</option>
                    </select>
                    <br><br><br>
                    <input type="submit" value="Complete" style="margin-left: 25px"/>


                    <br><br><br>
                    <h3>COMMENTS</h3>
                    <p>Please feel free to share any details or examples of your work for this initiative. Your responses will remain confidential.<br></p>
                    <textarea name="commentsEarnMorePointDiversityProtection" style="width: 600px; height: 150px;"></textarea><br>
                    <br><br>
                    <input type="submit" value="Post my Comment" style="margin-left: 25px" />
                </form>
            </div>
        </div>
    </section>
<?php else: ?>
    error: emp_questionnaire is empty.
<?php endif; ?>
</div>