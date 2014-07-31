<?php

/**
 * Class User
 * This controller shows the (public) account data of one or all user(s)
 */
class User extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /user/index in your app.
     * Shows a list of all users.
     */
    function index()
    {
        $user_model = $this->loadModel('User');
        $this->view->users = $user_model->getAllUsersProfiles();
        $this->view->render('user/index');
    }

    /**
     * This method controls what happens when you move to /user/showuserprofile in your app.
     * Shows the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    function showUserProfile($user_id)
    {
        if (isset($user_id)) {
            $user_model = $this->loadModel('User');
            $this->view->user = $user_model->getUserProfile($user_id);
            var_dump($this->view->user);
            $this->view->render('user/showuserprofile');
        } else {
            header('location: ' . URL);
        }
    }
}
