<?php

/**
 * Class Earnmorepoint
 * The earn_more_point area
 */
class Earnmorepoint extends Controller
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
     * This method controls what happens when you move to /earnmorepoint/index in your app.
     */
    function index()
    {

        $earnmorepoint_model = $this->loadModel('Earnmorepoint');
        $this->view->earnmorepoint = $earnmorepoint_model->getAllEarnmorepoints();
        $this->view->render('earnmorepoint/index');
    }


    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new note. This is usually the target of form submit actions.
     */
    public function create()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this note-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        
        $earnmorepoint_model = $this->loadModel('Earnmorepoint');
        $earnmorepoint_model->create();

        header('location: ' . URL . 'earnmorepoint');
            
        // if ($earnmorepoint_successful == true) {
        //     header('location: ' . URL . 'dashboard/index');
        // } else {
        //     header('location: ' . URL . 'help/index');
        // }
    }

    /**
     * This method controls what happens when you move to /note/edit(/XX) in your app.
     * Shows the current content of the note and an editing form.
     * @param $question_id int id of the note
     */
    public function edit($question_id)
    {
        echo "question_id:" . $question_id;
        if (isset($question_id)) {
            // get the note that you want to edit (to show the current content)
            $earnmorepoint_model = $this->loadModel('Earnmorepoint');
            $this->view->earnmorepoint = $earnmorepoint_model->getEarnmorepoint($question_id);
            $this->view->render('earnmorepoint/edit');
        } else {
            header('location: ' . URL . 'earnmorepoint');
        }
    }

    /**
     * This method controls what happens when you move to /note/editsave(/XX) in your app.
     * Edits a note (performs the editing after form submit).
     * @param int $question_id id of the note
     */
    public function editSave($question_id)
    {
        if (isset($question_id)) {
            // perform the update: pass question_id from URL and note_text from POST
            $earnmorepoint_model = $this->loadModel('Earnmorepoint');
            $earnmorepoint_model->editSave($question_id);
        }
        header('location: ' . URL . 'earnmorepoint');
    }

    /**
     * This method controls what happens when you move to /note/delete(/XX) in your app.
     * Deletes a note. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $note_id id of the note
     */
    public function delete($question_id)
    {
        if (isset($question_id)) {
            $earnmorepoint_model = $this->loadModel('Earnmorepoint');
            $earnmorepoint_model->delete($question_id);
        }
        header('location: ' . URL . 'earnmorepoint');
    }



}
