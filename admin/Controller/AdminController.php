<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

/**
 * Cms controller
 */
class AdminController extends Controller
{
    /**
     *
     * @var object Auth
     */
    protected $auth;
    /**
     * 
     * @param DI object $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
        
        $this->auth = new Auth();
        
        if (!$this->auth->authorized && $this->request->server['REQUEST_URI'] !== '/admin/login') 
        {
            header('Location: /admin/login', true, 301);
            exit();
        }
    }
}
