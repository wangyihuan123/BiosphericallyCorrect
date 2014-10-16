<?php

/**
 * Class Profile
 * This is a demo controller that simply shows an area that is only visible for the logged in user
 * because of Auth::handleLogin(); in line 19.
 */
class Profile extends Controller
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
     * This method controls what happens when you move to /profile/index in your app.
     */
    function index()
    {
        $this->view->render('profile/index');
    }


    /**
     * This method controls what happens when you move to /profile/edit(/XX) in your app.
     * Shows the current content of the profile and an editing form.
     * @param $profile_id int id of the profile
     */
    public function edit($profile_id)
    {
        if (isset($profile_id)) {
            // get the profile that you want to edit (to show the current content)
            $profile_model = $this->loadModel('Profile');
            $this->view->profile = $profile_model->getProfile($profile_id);
            $this->view->render('profile/edit');
        } else {
            header('location: ' . URL . 'profile');
        }
    }

    /**
     * This method controls what happens when you move to /profile/editsave(/XX) in your app.
     * Edits a profile (performs the editing after form submit).
     * @param int $profile_id id of the profile
     */
    public function editSave($profile_id)
    {
        if (isset($_POST['profile_text']) && isset($profile_id)) {
            // perform the update: pass profile_id from URL and profile_text from POST
            $profile_model = $this->loadModel('Profile');
            $profile_model->editSave($profile_id, $_POST['profile_text']);
        }
        header('location: ' . URL . 'profile');
    }

    /**
     * This method controls what happens when you move to /profile/delete(/XX) in your app.
     * Deletes a profile. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $profile_id id of the profile
     */
    public function delete($profile_id)
    {
        if (isset($profile_id)) {
            $profile_model = $this->loadModel('Profile');
            $profile_model->delete($profile_id);
        }
        header('location: ' . URL . 'profile');
    }
}
