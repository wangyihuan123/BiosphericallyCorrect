<?php

/**
 * Class Emp_Questionnaire
 * The emp_questionnaire area
 */
class Emp_Questionnaire extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();

        // this controller should only be visible/usable by logged in users, so we put login-check here
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /emp_questionnaire/index in your app.
     */
    function index($question_id)
    {
        if (isset($question_id)) {
            // get the note that you want to edit (to show the current content)
            $emp_questionnaire_model = $this->loadModel('Emp_Questionnaire');
            $this->view->emp_questionnaire = $emp_questionnaire_model->getEmpQuestion($question_id);
            // var_dump($this->view->emp_questionnaire);
            $this->view->emp_answer = $emp_questionnaire_model->getEmpAnswer($question_id);
            // var_dump($this->view->emp_answer);
            $this->view->render('emp_questionnaire/index');
        } else {
            // TODO: should be error
            header('location: ' . URL . 'help/emp_questionnaire');
        }
    }


    /**
     * This method controls what happens when you move to /emp_questionnaire/editsave(/XX) in your app.
     * Edits a form of emp_questionnaire (performs the editing after form submit).
     * @param int $user_id id of the note
     */
    public function editSave($user_id)
    {
        // now, we suppose $user_id is always 4
        //$user_id = 4;

        // var_dump($_POST);

        //if (isset($_POST['note_text']) && isset($user_id)) {
        {
            // perform the update: pass user_id from URL and note_text from POST
            $emp_questionnaire_model = $this->loadModel('Emp_Questionnaire');
            $emp_questionnaire_successful = $emp_questionnaire_model->editSave($user_id);
            //$note_model->editSave($note_id, $_POST['note_text']);
        }
        // header('location: ' . URL . 'emp_questionnaire');
        
        if ($emp_questionnaire_successful == true) {
            header('location: ' . URL . 'emp_questionnaire/index');
        } else {
            header('location: ' . URL . 'help/emp_questionnaire');
        }
    }


}
