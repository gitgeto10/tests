<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $stable = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email'];
}
?>
