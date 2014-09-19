<div class="container">

<div class="content">
    <h1>Questions Admin</h1>

    <!-- echo out the system feedback (error and success messages) -->
     <?php $this->renderFeedbackMessages(); ?>


    <h2 style="margin-top: 50px;">List of all questions</h2>

<!--     <table style="width:700px;margin-left: 10px">
        <tr>
            <th>ID</th> <th>class</th><th width="120px">category</th><th width="350px">content</th><th width="50px">action/detail weight</th>
        </tr> -->

    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>ID</th><th>class</th><th width="120px">category</th><th width="350px">content</th><th width="50px">action/detail weight</th>
                    </tr>
                </thead>
                <tbody>
    <?php
        if ($this->questions) {
            foreach($this->questions as $key => $value) {
                echo '<tr style="height:20px;">';
                //echo '<td>' . htmlentities($value->note_text) . '</td>';
                echo '<td>' . htmlentities($value->question_id) . '</td>';
                echo '<td>' . htmlentities($value->question_class) . '</td>';
                echo '<td>' . htmlentities($value->question_category) . '</td>';
                echo '<td>' . '<div class="textOverflow">' . htmlentities($value->question_content) . '</div>' . '</td>';
                echo '<td>' . htmlentities($value->question_action_weight) . '/' . htmlentities($value->question_description_weight) . '</td>';

                echo '<td><a href="'. URL . 'question/edit/' . $value->question_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'question/delete/' . $value->question_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No questions yet. Create some !';
        }
    ?>
            </table>
        </div>
    </div>

    <p>&nbsp;</p>
    
    <section id = "requiredActions">

        <h2>Add a question: </h2>
        <!-- <form action="adminHandle.php" method="post"> -->
        <form method="post" action="<?php echo URL; ?>question/create/<?php /*echo $this->ratingsystem->question_id; */?>">
            <table class="table_vertical_align_top">
                <tr>
                    <td>
                        ID:
                    </td>
                    <td>
                        <input type="text" name="question_id" size="10"/> (1~100)
                    </td>
                </tr>
                <tr>
                    <td>
                        Class:
                    </td>
                    <td>
                        <select name='question_add_class'>
                            <option>General</option>
                            <option>BC1</option>
                            <option>BC2</option>
                            <option>BC3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Category:
                    </td>
                    <td>
                        <select name='question_add_category'>
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
                        Content:
                    </td>
                    <td>
                        <textarea name="question_add_content" style="width: 300px; height: 150px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Caption:
                    </td>
                    <td>
                        <textarea name="question_add_caption" style="width: 200px; height: 50px;"></textarea>
                        (eg: Describe two projects last year)
                    </td>
                </tr>
                <tr>
                    <td>
                        Action weight:
                    </td>
                    <td>
                        <input type="text" name="question_add_action" size="10"/> (eg, 0~50, 0 means N/A)
                    </td>
                </tr>
                <tr>
                    <td>
                        Description weight:
                    </td>
                    <td>
                        <input type="text" name="question_add_description" size="10"/> (eg, 0~50, 0 means N/A)
                    </td>
                </tr>
            </table>

             
            <br>
            <input class="php-login" type="submit" value="Submit" />
        </form>



    </section>


</div>
</div>