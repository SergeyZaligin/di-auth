<?php

namespace Engine;
use Engine\DI\DI;
/**
 * Class Controller
 *
 * @author SuslikEst
 */
abstract class Controller
{
    /**
     * DI container object
     *
     * @var DI object
     */
    protected $di;
    protected $view;
    protected $db;
    protected $config;
    protected $request;


    /**
     * Constructor Controller
     *
     * @param DI $di object
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $di->get('db');
        $this->view = $di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
    }
}
