<?php

/**
 * Class Dashboard
 * This is a demo controller that simply shows an area that is only visible for the logged in user
 * because of Auth::handleLogin(); in line 19.
 */
class Dashboard extends Controller
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
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    function index()
    {
        $earnmorepoint_model = $this->loadModel('Earnmorepoint');
        $this->view->earnmorepoint = $earnmorepoint_model->getAllEarnmorepoints();
        $this->view->render('dashboard/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/show in your app.
     */
    function show()
    {
        $earnmorepoint_model = $this->loadModel('Earnmorepoint');
        $this->view->earnmorepoint = $earnmorepoint_model->getAllEarnmorepoints();
        $this->view->render('dashboard/show');
    }
}
