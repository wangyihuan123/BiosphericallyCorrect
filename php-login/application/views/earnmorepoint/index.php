<div class="content">

    <h1>Earn More Point Task Admin</h1>

    <!-- echo out the system feedback (error and success messages) -->
     <?php $this->renderFeedbackMessages(); ?>


    <h2 style="margin-top: 50px;">List of all tasks of Earn More Point</h2>

    <table style="width:700px;margin-left: 10px">
        
    <?php
        if ($this->earnmorepoint) {
            echo '<tr>
                    <th>ID</th><th width="120px">Category</th><th width="400px">Summary</th>
                </tr>';
            foreach($this->earnmorepoint as $key => $value) {
                echo '<tr style="height:20px;">';
                echo '<td>' . htmlentities($value->question_id) . '</td>';
                echo '<td>' . htmlentities($value->question_category) . '</td>';
                echo '<td>' . '<div class="textOverflow" width="400px">' . htmlentities($value->question_summary) . '</div>' . '</td>';
                
                echo '<td><a href="'. URL . 'earnmorepoint/edit/' . $value->question_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'earnmorepoint/delete/' . $value->question_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No earn more point questions yet. Create some !';
        }
    ?>
    </table>


        

<p>&nbsp;</p>
    
    <section id = "requiredActions">

        <h2>Add an Earn More Point Question </h2>


        <form method="post" action="<?php echo URL; ?>earnmorepoint/create">
        
            <table>
                <tr>
                    <td>
                        <div class = "test">ID:</div>
                    </td>
                    <td>
                        <input type="text" name="question_id" size="10"/> (1~100)
                    </td>
                </tr>
                <tr>
                    <td>
                        Question category:
                    </td>
                    <td>
                        <select name='emp_add_category'>
                            <option>Diversity protection</option>
                            <option>Green ingredients</option>
                            <option>Positive functionality</option>
                            <option>Eco processes</option>
                            <option>Trade integrity</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Question summary:
                    </td>
                    <td>
                        <textarea name="emp_add_summary" style="width: 300px; height: 50px;"></textarea>
                        eg: summary of the task 1.....
                    </td>
                </tr>
                <tr>
                    <td>
                        Full description:
                    </td>
                    <td>
                        <textarea name="emp_add_description" style="width: 300px; height: 150px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Resource:
                    </td>
                    <td>
                        <textarea name="emp_add_resource" style="width: 300px; height: 50px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Key steps:
                    </td>
                    <td>
                        <textarea name="emp_add_key_steps" style="width: 300px; height: 150px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Step Hint:
                    </td>
                    <td>
                        <textarea name="emp_add_step_hints" style="width: 300px; height: 50px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Percent caption:
                    </td>
                    <td>
                        <textarea name="emp_add_percent_caption" style="width: 300px; height: 50px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Total point :
                    </td>
                    <td>
                        <input type="text" name="emp_add_point" size="10"/> (1~100)
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr> -->

            </table> 
            <br>
            <br>
            <input type="submit" value="Submit" />
        </form>




    </section>


</div>