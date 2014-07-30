<?php

/**
 * Class Question
 * The note controller. Here we create, read, update and delete (CRUD) example data.
 */
class Question extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /note/index in your app.
     * Gets all notes (of the user).
     */
    public function index()
    {
        $question_model = $this->loadModel('Question');
        $this->view->questions = $question_model->getAllQuestions();
        $this->view->render('question/index');
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
        //if (isset($_POST['note_text']) AND !empty($_POST['note_text'])) {
            $question_model = $this->loadModel('Question');
            $question_model->create();

            header('location: ' . URL . 'question');
            // $this->view->questions = $question_model->getAllQuestions();
            // $this->view->render('question/index');
        //}
        //header('location: ' . URL . 'question');
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
            $question_model = $this->loadModel('Question');
            $this->view->question = $question_model->getQuestion($question_id);
            $this->view->render('question/edit');
        } else {
            header('location: ' . URL . 'question');
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
            $question_model = $this->loadModel('Question');
            $question_model->editSave($question_id);
        }
        header('location: ' . URL . 'question');
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
            $question_model = $this->loadModel('Question');
            $question_model->delete($question_id);
        }
        header('location: ' . URL . 'question');
    }
}
