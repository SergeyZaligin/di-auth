<?php

namespace Admin\Model\User;
use Engine\Model;
use Engine\DI\DI;
/**
 * Description of UserRepository
 *
 * @author Sergey
 */
class UserRepository extends Model
{
    public function __construct(DI $di) {
        parent::__construct($di);
    }
    public function getAll() 
    {
        return $this->db->query('SELECT * FROM user ORDER BY id DESC', []);
    }
}
