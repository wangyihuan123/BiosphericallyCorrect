<?php

/**
 * Class Questionnaire
 * The questionnaire area
 */
class Questionnaire extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /questionnaire/index in your app.
     */
    function index()
    {
        $this->view->render('questionnaire/index');
    }


    /**
     * This method controls what happens when you move to /questionnaire/editsave(/XX) in your app.
     * Edits a form of questionnaire (performs the editing after form submit).
     * @param int $user_id id of the note
     */
    public function editSave($user_id)
    {
        // now, we suppose $user_id is always 4
        $user_id = 4;

        echo "in the controller->editSave .....<br>";

        var_dump($_POST);

        //if (isset($_POST['note_text']) && isset($user_id)) {
        {
            // perform the update: pass user_id from URL and note_text from POST
            $questionnaire_model = $this->loadModel('Questionnaire');
            $questionnaire_successful = $questionnaire_model->editSave($user_id);
            //$note_model->editSave($note_id, $_POST['note_text']);
        }
        // header('location: ' . URL . 'questionnaire');
        
        if ($questionnaire_successful == true) {
            header('location: ' . URL . 'dashboard/index');
        } else {
            header('location: ' . URL . 'help/index');
        }
    }


}
