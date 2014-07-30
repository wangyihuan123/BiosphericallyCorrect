<?php

/**
 * QuestionModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class QuestionModel
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
    public function getAllQuestions()
    {
        //$sql = "SELECT user_id, note_id, note_text FROM notes WHERE user_id = :user_id";
        $sql = "SELECT question_id, question_class, question_content, question_category, question_action_weight,
                 question_description_weight FROM wp_test_question";
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
    public function getQuestion($question_id)
    {
        echo "question_id again: " . $question_id;
        $sql = "SELECT * FROM wp_test_question WHERE question_id = :question_id";
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
            $sql = "INSERT INTO wp_test_question (`question_id`, `question_class`, `question_content`, `question_special_flag`, `question_category`, `question_action_weight`, `question_description_weight`, `question_description_caption`) 
                VALUES
                (:question_id, :question_class, :question_content, :question_special_flag, :question_category, :question_action_weight, :question_description_weight, :question_description_caption)";

            $query = $this->db->prepare($sql);
            $query->execute(array(':question_id' => $_POST[question_id], 
                                ':question_class' => $_POST[question_add_class], 
                                ':question_content' => $_POST[question_add_content],
                                ':question_special_flag' => NULL, 
                                ':question_category' => $_POST[question_add_category], 
                                ':question_action_weight' => $_POST[question_add_action], 
                                ':question_description_weight' => $_POST[question_add_description], 
                                ':question_description_caption' => $_POST[question_add_caption]));
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

        $sql = "UPDATE wp_test_question SET question_id = :question_id, 
                                question_class = :question_class, 
                                question_content = :question_content,
                                question_category = :question_category, 
                                question_action_weight = :question_action_weight, 
                                question_description_weight = :question_description_weight, 
                                question_description_caption = :question_description_caption
                                WHERE question_id = :question_id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':question_id' => $_POST[question_id], 
                                ':question_class' => $_POST[question_add_class], 
                                ':question_content' => $_POST[question_add_content],
                                ':question_category' => $_POST[question_add_category], 
                                ':question_action_weight' => $_POST[question_add_action], 
                                ':question_description_weight' => $_POST[question_add_description], 
                                ':question_description_caption' => $_POST[question_add_caption]));
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
        $sql = "DELETE FROM wp_test_question WHERE question_id = :question_id";
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
