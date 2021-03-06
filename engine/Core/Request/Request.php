<?php declare(strict_types=1);

namespace Engine\Core\Request;

/**
 * Class Request
 *
 * @author SuslikEst
 */
class Request 
{
    /**
     *
     * @var array
     */
    public $get = [];
    /**
     *
     * @var array
     */
    public $post = [];
    /**
     *
     * @var array
     */
    public $request = [];
    /**
     *
     * @var array
     */
    public $cookie = [];
    /**
     *
     * @var array
     */
    public $files = [];
    /**
     *
     * @var array
     */
    public $server = [];
    
    /**
     * Request constructor
     */
    public function __construct() 
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->cookie = $_COOKIE;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }
}
