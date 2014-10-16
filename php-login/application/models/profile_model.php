<?php

/**
 * ProfileModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class ProfileModel
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
     * Getter for a single profile
     * @param int $profile_id id of the specific profile
     * @return object a single object (the result)
     */
    public function getProfile($profile_id)
    {
        $sql = "SELECT user_id, profile_id, profile_text FROM profiles WHERE user_id = :user_id AND profile_id = :profile_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id'], ':profile_id' => $profile_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a profile (create)
     * @param string $profile_text profile text that will be created
     * @return bool feedback (was the profile created properly ?)
     */
    public function create($data)
    {
        // clean the input to prevent for example javascript within the profiles.
        $profile_text = strip_tags($profile_text);

        $sql = "INSERT INTO profiles (profile_text, user_id) VALUES (:profile_text, :user_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':profile_text' => $profile_text, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Setter for a profile (update)
     * @param int $profile_id id of the specific profile
     * @param string $profile_text new text of the specific profile
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($profile_id, $profile_text)
    {
        // clean the input to prevent for example javascript within the profiles.
        $profile_text = strip_tags($profile_text);

        $sql = "UPDATE profiles SET profile_text = :profile_text WHERE profile_id = :profile_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':profile_id' => $profile_id, ':profile_text' => $profile_text, ':user_id' => $_SESSION['user_id']));

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
     * Deletes a specific profile
     * @param int $profile_id id of the profile
     * @return bool feedback (was the profile deleted properly ?)
     */
    public function delete($profile_id)
    {
        $sql = "DELETE FROM profiles WHERE profile_id = :profile_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':profile_id' => $profile_id, ':user_id' => $_SESSION['user_id']));

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
