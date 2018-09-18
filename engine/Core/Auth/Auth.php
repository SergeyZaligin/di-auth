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
    protected $hashUser;

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
    public function hashUser()
    {
        return Cookie::get('auth_user');
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
    }
    /**
     * unAuthorize user
     *
     * @param object $user
     */
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
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
