<?php
namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{
    protected $table = 'r6_match';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'map', 'match_date', 'match_duration', 'winning_team', 'final_result', 'mvp'
    ];
    public $timestamps = false;
}