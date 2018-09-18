<?php

namespace Admin\Controller;
use Admin\Model\User\UserRepository;

/**
 * Description of DashboardController
 *
 * @author sergey
 */
class DashboardController extends AdminController
{
    public function index() 
    {
        $userModel = new UserRepository();
        print_r($userModel->getAll());
        $this->view->render('dashboard');
    }
}
