<?php declare(strict_types=1);

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;
/**
 * Router provider
 *
 * @author SuslikEst
 */
class Provider extends AbstractProvider
{
    /**
     * Service name
     * 
     * @var string
     */
    public $serviceName = 'request';
    
    /**
     * Initialize service
     * 
     * @return mixed
     */
    public function init() 
    {
        $request = new Request();
        $this->di->set($this->serviceName, $request);
    }

}
