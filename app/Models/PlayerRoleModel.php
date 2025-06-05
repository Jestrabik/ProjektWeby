<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerRoleModel extends Model
{
    protected $table      = 'r6_role';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'role_name',
    ];
}