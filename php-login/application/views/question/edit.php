<div class="content">
    <h1>Edit a Question</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php if ($this->question) { ?>
        <form method="post" action="<?php echo URL; ?>question/editSave/<?php echo $this->question->question_id; ?>">
            <!-- <label>Change text of question: </label> -->
            
            <table>
                <tr>
                    <td>
                        <div class = "test">ID:</div>
                    </td>
                    <td>
                        <input type="text" name="question_id" size="10" value="<?php echo $this->question->question_id; ?>" /> (1~100)
                    </td>
                </tr>
                <tr>
                    <td>
                        Class:
                    </td>
                    <td>
                        <select name='question_add_class' value="<?php echo $this->question->question_class; ?>">
                            <option
                            <?php if ($this->question->question_class == "General") echo "selected";?> 
                            >General</option>
                            <option
                            <?php if ($this->question->question_class == "BC1") echo "selected";?>
                            >BC1</option>
                            <option
                            <?php if ($this->question->question_class == "BC2") echo "selected";?>
                            >BC2</option>
                            <option
                            <?php if ($this->question->question_class == "BC3") echo "selected";?>
                            >BC3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Category:
                    </td>
                    <td>
                        <select name='question_add_category'>
                            <option 
                            <?php if ($this->question->question_category == "Diversity protection") echo "selected";?> 
                            >Diversity protection</option>
                            <option 
                            <?php if ($this->question->question_category == "Green ingredients") echo "selected";?> 
                            >Green ingredients</option>
                            <option 
                            <?php if ($this->question->question_category == "Positive functionality") echo "selected";?>
                            >Positive functionality</option>
                            <option
                            <?php if ($this->question->question_category == "Eco processes") echo "selected";?>
                            >Eco processes</option>
                            <option
                            <?php if ($this->question->question_category == "Trade integrity") echo "selected";?>
                            >Trade integrity</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Content: 
                    </td>
                    <td>
                        <textarea name="question_add_content" style="width: 300px; height: 150px;"><?php echo htmlentities($this->question->question_content); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Caption:
                    </td>
                    <td>
                        <textarea name="question_add_caption" style="width: 200px; height: 50px;"><?php echo htmlentities($this->question->question_description_caption); ?></textarea>
                        (eg: Describe two projects last year)
                    </td>
                </tr>
                <tr>
                    <td>
                        Action weight:
                    </td>
                    <td>
                        <input type="text" name="question_add_action" size="10" value="<?php echo $this->question->question_action_weight; ?>"/> (eg, 0~50, 0 means N/A)
                    </td>
                </tr>
                <tr>
                    <td>
                        Description weight:
                    </td>
                    <td>
                        <input type="text" name="question_add_description" size="10" value="<?php echo $this->question->question_description_weight; ?>"/> (eg, 0~50, 0 means N/A)
                    </td>
                </tr>
            </table>

            <br>
            <br>
            <input type="submit" value='Change' />
        </form>
    <?php } else { ?>
        <p>This question does not exist.</p>
    <?php } ?>


</div>
