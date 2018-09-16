<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

/**
 * Description of LoginController
 *
 * @author sergey
 */
class LoginController extends Controller
{
    /**
     *
     * @var object Auth
     */
    protected $auth;
    
    /**
     * Login constructor
     * 
     * @param DI object $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
        
        $this->auth = new Auth();
    }
    
    /**
     * Render login form
     * 
     * @return void
     */
    public function form() 
    {
        $this->view->render('login');
    }
    
    public function authAdmin() 
    {
        $params = $this->request->post;
        
        $this->auth->authorize('dddd');
        
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }
}
