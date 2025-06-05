<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table      = 'r6_team';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'team_name',
        'coach',
        'nationality',
        'ranking',
    ];
}