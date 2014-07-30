<?php

/**
 * NoteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class QuestionnaireModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Getter for all notes (notes are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    // public function getAllNotes()
    // {
    //     $sql = "SELECT user_id, note_id, note_text FROM notes WHERE user_id = :user_id";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':user_id' => $_SESSION['user_id']));

    //     // fetchAll() is the PDO method that gets all result rows
    //     return $query->fetchAll();
    // }

    /**
     * Getter for a single note
     * @param int $note_id id of the specific note
     * @return object a single object (the result)
     */
    // public function getNote($note_id)
    // {
    //     $sql = "SELECT user_id, note_id, note_text FROM notes WHERE user_id = :user_id AND note_id = :note_id";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':user_id' => $_SESSION['user_id'], ':note_id' => $note_id));

    //     // fetch() is the PDO method that gets a single result
    //     return $query->fetch();
    // }

    /**
     * Setter for a note (create)
     * @param string $note_text note text that will be created
     * @return bool feedback (was the note created properly ?)
     */
    // public function create($note_text)
    // {
    //     // clean the input to prevent for example javascript within the notes.
    //     $note_text = strip_tags($note_text);

    //     $sql = "INSERT INTO notes (note_text, user_id) VALUES (:note_text, :user_id)";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':note_text' => $note_text, ':user_id' => $_SESSION['user_id']));

    //     $count =  $query->rowCount();
    //     if ($count == 1) {
    //         return true;
    //     } else {
    //         $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
    //     }
    //     // default return
    //     return false;
    // }

    /**
     * Setter for a note (update)
     * @param int $user_id id of the specific user's questionnaire
     * @param string $note_text new text of the specific note
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($note_id, $note_text)
    // {
    //     // clean the input to prevent for example javascript within the notes.
    //     $note_text = strip_tags($note_text);

    //     $sql = "UPDATE notes SET note_text = :note_text WHERE note_id = :note_id AND user_id = :user_id";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':note_id' => $note_id, ':note_text' => $note_text, ':user_id' => $_SESSION['user_id']));

    //     $count =  $query->rowCount();
    //     if ($count == 1) {
    //         return true;
    //     } else {
    //         $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
    //     }
    //     // default return
    //     return false;
    // }
    {

        $res = 0;


        $db = new mysqli('localhost', 'root', 'ZpCnGva0', 'test');
        if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database. Please try again later."; exit;
        }



        date_default_timezone_set('Pacific/Auckland');

        $g_category_array = array("Diversity protection", "Green ingredients", "Positive functionality", "Eco processes", "Trade integrity");
        var_dump($g_category_array);
        $g_category_switch_array = array ("Diversity protection"=>'1', "Green ingredients"=>'2', "Positive functionality"=>'3', 
            "Eco processes"=>'4', "Trade integrity"=>'5');
        var_dump($g_category_switch_array);
        echo "<br>";
        echo $g_category_switch_array["Positive functionality"];
        echo "<br>";

        $point["Diversity protection"] = 0;
        $point["Green ingredients"] = 0;
        $point["Positive functionality"] = 0;
        $point["Eco processes"] = 0;
        $point["Trade integrity"] = 0;


        //echo date("Y-m-d H:i:s");
        // TODO   answer1->  NEW database table!!!!
        $tbl_name="wp_test_answer"; // Table name 
        for ($i = 1; $i <= 100; $i++)
        {
            //echo "answer$i";

            if (empty($_POST["answer$i"])) {
                continue;
            }

            $answer = $_POST["answer$i"];
            $answer_detail_name = "answer_detail$i";
            echo "...";
            echo $answer_detail_name;
            echo $_POST["$answer_detail_name"];


            $answer_detail = $_POST["$answer_detail_name"];
            echo "<br>:";
            echo $answer_detail;
            echo "<br>";

            $query = "INSERT INTO $tbl_name (`question_id`, `user_id`, `action`, `description`, `date`, `comment`) VALUES
             ('$i', '4', '$answer', '$answer_detail', '".date("Y-m-d H:i:s")."', NULL)";

            
            $result = $db->query($query);
            if ($result) {
                //echo $db->affected_rows."Congratulation! Please go back to your dashboard!";
            } else {
                echo $query; 
                echo "An error has occurred. The item was not added.".__LINE__;
                
                $query = "update  $tbl_name set  `action` = '$answer', `description` = '$answer_detail', `date` = '".date("Y-m-d H:i:s")."', `comment` = NULL where `question_id` = '$i' and `user_id` = '4'";
                echo $query; 
                $result = $db->query($query);
                if ($result) {
                    
                } else {
                    echo "An error has occurred. The item was not updated.".__LINE__;
                    continue;
                }
                //$res = -1;
            }

            // if already answer the quesion before
            $question_table_name = "wp_test_question";
            $user_id = 4;
            $question_sql = "SELECT * FROM $question_table_name WHERE question_id='$i'";

            $result_sql = $db->query($question_sql);
            if ($result_sql) {
                //echo $db->affected_rows."Congratulation! Please go back to your dashboard!";
            } else {
                echo $question_sql;
                echo "An error has occurred. The item was not found.".__LINE__;
                $res = -1;
            }

            echo "<br>";
            echo mysqli_num_rows($result_sql);

            echo "<br>.....<br>";

            if (mysqli_num_rows($result_sql) != 1) {
                echo $question_sql;
                echo "No rows found, nothing to print so am exiting".__LINE__;
                echo mysqli_num_rows($result_sql);
                echo "<br>";
                //TODO:
                //exit;
            }

            $rows=mysqli_fetch_assoc($result_sql);
            echo $rows;
            echo "<br>..<br>";
            $category = $rows["question_category"];
            echo $category ;
            echo "<br>";

            if ("yes" == $answer) {
                $point["$category"] += $rows["question_action_weight"];
            }

            if (NULL != $answer_detail) {
                $point["$category"] += $rows["question_description_weight"];
            }

            // TODO: how about the comments

            // TODO: need to check the point before update!!!!!!

        }

        var_dump($point);


        foreach ($g_category_array as $category) {

            $point_cate = $point["$category"];
            $category_id = $g_category_switch_array["$category"];
            $query_update = "update wp_test_user_point_new set `in_all_point` = $point_cate , `point` = $point_cate where `user_id` = 4 and `category_id` = '$category_id'";
            $result = $db->query($query_update);
            echo $query_update ;
            if ($result) {
                //echo $db->affected_rows."Congratulation! Please go back to your dashboard!";
            } else {
                echo $query_update ;
                echo "An error has occurred. The item was not updated.".__LINE__;
                $res = -1;
            }

        }

        return true;
    }





    /**
     * Deletes a specific note
     * @param int $note_id id of the note
     * @return bool feedback (was the note deleted properly ?)
     */
    public function delete($note_id)
    {
        $sql = "DELETE FROM notes WHERE note_id = :note_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':note_id' => $note_id, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_DELETION_FAILED;
        }
        // default return
        return false;
    }
}
