<?php

namespace Admin\Controller;
use Admin\Model\UserRepository;

/**
 * Description of DashboardController
 *
 * @author sergey
 */
class DashboardController extends AdminController
{
    public function index() 
    {
        $this->view->render('dashboard');
    }
}
