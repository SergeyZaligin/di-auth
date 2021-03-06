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

        if($this->auth->hashUser() !== null)
        {
            header('Location: /admin/');
            exit();
        }
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

        $query = $this->db->query("SELECT * FROM user WHERE email=:email AND password=:password LIMIT 1", [
              'email' => $params['email'],
              'password' => md5($params['password'])
        ]);

        if(!empty($query))
        {
            $user = $query[0];
            if('admin' === $user['role'])
            {
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                $this->db->query('UPDATE user SET hash=:hash WHERE id=:id', [
                    'hash' => $hash,
                    'id' => $user['id']
                ]);
                $this->auth->authorize($hash);
                header('Location: /admin/login');
                exit();
            }
        }
    }
}
