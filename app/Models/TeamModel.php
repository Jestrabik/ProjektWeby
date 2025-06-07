<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table      = 'r6_team';
    protected $primaryKey = 'team_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'team_id',
        'team_name',
        'coach',
        'nationality',
        'ranking',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}