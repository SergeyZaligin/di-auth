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
     * Admin constructor
     *
     * @param DI object $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if($this->auth->hashUser() == null)
        {
          header('Location: /admin/login');
          exit();
        }
    }

    /**
     * Check authorized user
     *
     * @return void
     */
    public function checkAuthorization()
    {

    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login');
        exit();
    }
}
