<?php

namespace App\Models;

use CodeIgniter\Model;

class NationalityModel extends Model
{
    protected $table      = 'nationalities';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nationality',
        'country_code',
    ];
}