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
        $user_id =1;
        if (isset($user_id)) {
            // TODO:  
            // $user_model = $this->loadModel('Profile');
            // $this->view->user = $user_model->getUserProfile($user_id);
            // var_dump($this->view->user);
            $this->view->render('profile/index');
        } else {
            header('location: ' . URL);
        }
        
    }


    
    /**
     * This method controls what happens when you move to /user/edituserprofile in your app.
     * Edit the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    function edit($user_id)
    {
        
        if (isset($user_id)) {
            $profile_model = $this->loadModel('Profile');
            $this->view->basicProfile = $profile_model->getBasicProfile($user_id);
            // var_dump($this->view->basicProfile);
            $this->view->render('profile/edit');
        } else {
            header('location: ' . URL);
        }
    }

    
    /**
     * This method controls what happens when you submit from /user/edituserprofile in your app.
     * Save the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    function editSave($user_id)
    {
        if (isset($user_id)) {
            $profile_model = $this->loadModel('Profile');
            $successful = $profile_model->editSave($user_id);   //, $_POST);

            // use phpStorm to debug!
            
            if ($successful)
            {
                $this->view->render('profile/editsuccess');

                return;
            }
        }

        // default: error and redirect to home page 
        header('location: ' . URL);
        
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
