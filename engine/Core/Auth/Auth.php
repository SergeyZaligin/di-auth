<?php declare(strict_types=1);

namespace Engine\Core\Auth;

use Engine\Core\Auth\AuthInteface;
use Engine\Helper\Cookie;

/**
 * Class Authorization
 *
 * @author SuslikEst
 */
class Auth implements AuthInteface
{
    /**
     * Status user authorized or not authorized
     * @var boolean
     */
    protected $authorized = false;
    /**
     * Object user
     * 
     * @var mixed
     */
    protected $user;
    
    /**
     * Get status user authorized or not authorized
     * 
     * @return bool
     */
    public function authorized(): bool
    {
        return $this->authorized;
    }
    /**
     * Return user
     * @return mixed
     */
    public function user() 
    {
        return $this->user;
    }
    /**
     * Authorization user
     * 
     * @param $user
     */
    public function authorize($user) 
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
        
        $this->authorized = true;
        $this->user = $user;
    }
    /**
     * unAuthorize user
     * 
     * @param objject $user
     */
    public function unAuthorize($user): void
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
        
        $this->authorized = false;
        $this->user = null;
    }
    /**
     * Generate a new password salt
     * 
     * @return int
     */
    public static function salt() 
    {
        return (string) rand(10000000, 99999999);
    }
    /**
     * Generates a hash
     * @param string $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }
}
