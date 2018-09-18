<?php

namespace Admin\Model;

/**
 * Description of UserRepository
 *
 * @author Sergey
 */
class UserRepository 
{
    public function getAll($param) 
    {
        return $this->db->query('SELECT * FROM user ORDER BY id DESC', []);
    }
}
