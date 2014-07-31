<?php

/**
 * NoteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class EarnmorepointModel
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
    public function getAllEarnmorepoints()
    {
        //$sql = "SELECT user_id, note_id, note_text FROM notes WHERE user_id = :user_id";
        $sql = "SELECT * FROM wp_test_earn_more_point_question";
        $query = $this->db->prepare($sql);
        //$query->execute(array(':user_id' => $_SESSION['user_id']));
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single note
     * @param int $note_id id of the specific note
     * @return object a single object (the result)
     */
    public function getEarnmorepoint($question_id)
    {
        echo "question_id again: " . $question_id;
        $sql = "SELECT * FROM wp_test_earn_more_point_question WHERE question_id = :question_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':question_id' => $question_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a note (create)
     * @param string $note_text note text that will be created
     * @return bool feedback (was the note created properly ?)
     */
    public function create()
    {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO wp_test_earn_more_point_question 
            (`question_id`, `question_category`, `question_summary`, `full_description`, `key_steps`, `resource`, `step_hint`, `percent_caption`, `percent_point`) 
                VALUES
            (:question_id, :question_category, :question_summary, :full_description, :key_steps, :resource, :step_hint, :percent_caption, :percent_point)";

            $query = $this->db->prepare($sql);
            $query->execute(array(':question_id' => $_POST[question_id], 
                                ':question_category' => $_POST[emp_add_category], 
                                ':question_summary' => $_POST[emp_add_summary], 
                                ':full_description' => $_POST[emp_add_description],
                                ':key_steps' => $_POST[emp_add_resource], 
                                ':resource' => $_POST[emp_add_key_steps], 
                                ':step_hint' => $_POST[emp_add_step_hints],
                                ':percent_caption' => $_POST[emp_add_percent_caption], 
                                ':percent_point' => $_POST[emp_add_point]));
        } catch (Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
            exit;
        }
          
        // // clean the input to prevent for example javascript within the notes.
        // $note_text = strip_tags($note_text);

        // $sql = "INSERT INTO notes (note_text, user_id) VALUES (:note_text, :user_id)";
        // $query = $this->db->prepare($sql);
        // $query->execute(array(':note_text' => $note_text, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
            echo "mysql error: " . $sql;
        }
        // default return
        return false;
    }

    /**
     * Setter for a note (update)
     * @param int $question_id id of the specific note
     * @param string $note_text new text of the specific note
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($question_id, $note_text)
    {
        // clean the input to prevent for example javascript within the notes.
        $note_text = strip_tags($note_text);

        $sql = "UPDATE wp_test_earn_more_point_question SET 
                                question_id = :question_id, 
                                question_category = :question_category, 
                                question_summary = :question_summary, 
                                full_description = :full_description,
                                key_steps = :key_steps, 
                                resource = :resource, 
                                percent_caption = :percent_caption,
                                percent_point = :percent_point,
                                WHERE question_id = :question_id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':question_id' => $_POST[question_id], 
                                ':question_category' => $_POST[emp_add_category], 
                                ':question_summary' => $_POST[emp_add_summary], 
                                ':full_description' => $_POST[emp_add_description],
                                ':key_steps' => $_POST[emp_add_resource], 
                                ':resource' => $_POST[emp_add_key_steps], 
                                ':step_hint' => $_POST[emp_add_step_hints],
                                ':percent_caption' => $_POST[emp_add_percent_caption], 
                                ':percent_point' => $_POST[emp_add_point]));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Deletes a specific note
     * @param int $question_id id of the note
     * @return bool feedback (was the note deleted properly ?)
     */
    public function delete($question_id)
    {
        $sql = "DELETE FROM wp_test_earn_more_point_question WHERE question_id = :question_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':question_id' => $question_id));

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
