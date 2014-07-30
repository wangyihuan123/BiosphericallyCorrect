<div class="content">
    <div class = "test">
        <h1>Diversity protection</h1>
        <p>task 1:  summary of the task 1 in Diversity protection</p>
    </div>

<p>&nbsp;</p>

    <section id = "EarnMorePointDiversityProtection">
        <div class="EMP_totalPoint">
            <p>POINTS TOTAL</p>
            <h1>
                <?php
                    require_once MYLIBS_PATH . 'test_common.php';
                    echo test_get_earn_more_point(4,1);
                ?>
            </h1>
        </div>
        <div class="tableContainer">
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
            
        </div>  
        <br><br>
        <div class = "EMP_resource">
            <p> RESOURCE </p>
            <p> Biospherically Correct </p>
            <p> Green Business Certification </p>
            <p> Environmental Standards for Paint</p>
            <p> Updated Standards</p>
        </div>
        <div class = "EMP_content">
            <div class = "EMP_fullDescription">
                <h3> FULL DESCRIPTION </h3>
                <p>long full description ...... ......  ........... .......... ........... ........ ................... ........... ............. ...... .......... long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long full description</p>
            </div>

            <div class = "EMP_stepsHint">
                <p>hint description hint hint hint hint hint hint hint description</p>
            </div>
            <div class = "EMP_KeySteps">
                <h3> Key Steps </h3>
                <ul> 
                    <li>detail description of step .... ..... ....... ....... detail description of step</li> 
                </ul> 
                <p> </p>
            </div>
            <div>
                <h3> To complete this initiative, you must answer the following question: </h3>
                <p> What percentage of your products are certified by Biospherically Correct?</p>

                <form method="post" action="<?php echo URL; ?>earnmorepoint/editSave/<?php 
                echo $_SESSION['user_id'];
                //echo $this->note->note_id; 
                ?>">
                <!-- <form action="BiosphericallyCorrect/handle.php" method="POST"> -->
                    <select name='task1_process'>
                        <option>0~25%</option>
                        <option>25~50%</option>
                        <option>50~75%</option>
                        <option>75~100%</option>
                    </select>
                    <br><br><br>
                    <input type="submit" value="Complete" />


                    <br><br><br>
                    <h3>Comments.</h3>
                    <p>Please feel free to share any details or examples of your work for this initiative. Your responses will remain confidential.<br></p>
                    <textarea name="commentsEarnMorePointDiversityProtection" style="width: 600px; height: 150px;"></textarea><br>
                    <br><br>
                    <input type="submit" value="Post my Comment" />
                </form>
            </div>
        </div>
    </section>
</div>