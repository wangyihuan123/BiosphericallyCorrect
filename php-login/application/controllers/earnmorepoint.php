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
    }

    /**
     * This method controls what happens when you move to /earnmorepoint/index in your app.
     */
    function index()
    {
        $this->view->render('earnmorepoint/index');
    }


    /**
     * This method controls what happens when you move to /earnmorepoint/editsave(/XX) in your app.
     * Edits a form of earnmorepoint (performs the editing after form submit).
     * @param int $user_id id of the note
     */
    public function editSave($user_id)
    {
        // now, we suppose $user_id is always 4
        $user_id = 4;

        echo "in the controller->earnmorepoint->editSave .....<br>";

        var_dump($_POST);

        //if (isset($_POST['note_text']) && isset($user_id)) {
        {
            // perform the update: pass user_id from URL and note_text from POST
            $earnmorepoint_model = $this->loadModel('Earnmorepoint');
            $earnmorepoint_successful = $earnmorepoint_model->editSave($user_id);
            //$note_model->editSave($note_id, $_POST['note_text']);
        }
        // header('location: ' . URL . 'earnmorepoint');
        
        if ($earnmorepoint_successful == true) {
            header('location: ' . URL . 'dashboard/index');
        } else {
            header('location: ' . URL . 'help/index');
        }
    }


}
