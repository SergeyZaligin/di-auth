<?php

namespace Admin\Model\User;
use Engine\Model;


/**
 * Description of UserRepository
 *
 * @author Sergey
 */
class UserRepository extends Model
{
    
    public function getAll() 
    {
        return $this->db->query('SELECT * FROM user ORDER BY id DESC', []);
    }
}
