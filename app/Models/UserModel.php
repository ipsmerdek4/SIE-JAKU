<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = "db_users";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'name'];


  
   
}
