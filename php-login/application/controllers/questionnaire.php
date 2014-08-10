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

        // this controller should only be visible/usable by logged in users, so we put login-check here
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /questionnaire/index in your app.
     */
    function index()
    {
        // TODO: get the questions and answers from db
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
        //$user_id = 4;

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
            $earnmorepoint_model = $this->loadModel('Earnmorepoint');
            $this->view->earnmorepoint = $earnmorepoint_model->getAllEarnmorepoints();
            $this->view->render('dashboard/index');
            //header('location: ' . URL . 'dashboard/index');
        } else {
            $this->view->render('help/index');
            //header('location: ' . URL . 'help/index');
        }
    }


}
