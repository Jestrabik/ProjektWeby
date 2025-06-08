<?php
namespace App\Controllers;

use App\Models\MatchModel;

class MatchController extends BaseController
{
    public function index()
    {
        $matchModel = new MatchModel();
        $matches = $matchModel->orderBy('match_date', 'DESC')->findAll();

        return view('match/list', [
            'matches' => $matches
        ]);
    }
}