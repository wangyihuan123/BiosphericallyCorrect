<div class="content">
    <h1>Edit an Earn More Point Question</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php if ($this->earnmorepoint) { ?>
        
        <form method="post" action="<?php echo URL; ?>earnmorepoint/edit/<?php echo $this->earnmorepoint->question_id; ?>">
        
            <div class = "test">ID:
                <input type="text" name="question_id" size="10"/> (1~100)
            </div>
            <div>
            Question category:
            <select name='emp_add_category'>
                <option>Diversity protection</option>
                <option>Green ingredients</option>
                <option>Positive functionality</option>
                <option>Eco processes</option>
                <option>Trade integrity</option>
            </select>
            </div>
            <br>
            <div>Question summary:
            <textarea name="emp_add_summary" style="width: 200px; height: 50px;"></textarea>
            eg: summary of the task 1.....</div>
            <br>
            <div> Full description:
            <textarea name="emp_add_description" style="width: 300px; height: 150px;"></textarea>
            </div>
            <br>
            <div> Resource:
            <textarea name="emp_add_resource" style="width: 300px; height: 50px;"></textarea>
            </div>
            <br>
            <div> Key steps:
            <textarea name="emp_add_key_steps" style="width: 300px; height: 150px;"></textarea>
            </div>
            <br>
            <div> Step Hint:
            <textarea name="emp_add_step_hints" style="width: 200px; height: 50px;"></textarea>
            </div>
            <br>
            <div> Percent caption:
            <textarea name="emp_add_percent_caption" style="width: 200px; height: 50px;"></textarea>
            </div>
            <br>
            <div>Question percentage point :
            <input type="text" name="emp_add_point" size="10"/> (the point for each percentage, 0~25% can earn 10 point)
            </div>
            <br>
            
            <br>
            <input type="submit" value="Submit" />
        </form>

    <?php } else { ?>
        <p>This question does not exist.</p>
    <?php } ?>


</div>
