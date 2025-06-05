<?php

namespace App\Controllers;

use App\Models\TeamModel;
use App\Libraries\AlertLibrary;

class TeamController extends BaseController
{
    protected $teamModel;

    public function __construct()
    {
        $this->teamModel = new TeamModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('r6_team');
        $builder->select('r6_team.*, COUNT(r6_player.id) as player_count');
        $builder->join('r6_player', 'r6_player.team_id = r6_team.id AND r6_player.deleted_at IS NULL', 'left');
        $builder->where('r6_team.deleted_at', null);
        $builder->groupBy('r6_team.id');
        $teams = $builder->get()->getResultArray();

        return view('team/list', [
            'teams' => $teams
        ]);
    }

    public function create()
    {
        return view('team/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'team_name' => 'required',
            // případně další validační pravidla pro další pole
        ]);
        if (! $validation->withRequest($this->request)->run()) {
            AlertLibrary::setAlert('danger', 'Chyba validace. Zkontrolujte formulář.');
            return redirect()->back()->withInput();
        }

        $this->teamModel->save([
            'team_name' => $this->request->getPost('team_name'),
            // další pole...
        ]);

        AlertLibrary::setAlert('success', 'Tým byl úspěšně přidán.');
        return redirect()->to('/teams');
    }

    public function edit($id)
    {
        $team = $this->teamModel->find($id);
        if (!$team) {
            AlertLibrary::setAlert('danger', 'Tým nebyl nalezen.');
            return redirect()->to('/teams');
        }
        return view('team/edit', ['team' => $team]);
    }

    public function update($id)
    {
        $team = $this->teamModel->find($id);
        if (!$team) {
            AlertLibrary::setAlert('danger', 'Tým nebyl nalezen.');
            return redirect()->to('/teams');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'team_name' => 'required',
            // případně další validační pravidla pro další pole
        ]);
        if (! $validation->withRequest($this->request)->run()) {
            AlertLibrary::setAlert('danger', 'Chyba validace. Zkontrolujte formulář.');
            return redirect()->back()->withInput();
        }

        $this->teamModel->update($id, [
            'team_name' => $this->request->getPost('team_name'),
            // další pole...
        ]);

        AlertLibrary::setAlert('success', 'Tým byl úspěšně upraven.');
        return redirect()->to('/teams');
    }

    public function delete($id)
    {
        $team = $this->teamModel->find($id);
        if (!$team) {
            AlertLibrary::setAlert('danger', 'Tým nebyl nalezen.');
            return redirect()->to('/teams');
        }

        $this->teamModel->delete($id);
        AlertLibrary::setAlert('success', 'Tým byl úspěšně smazán.');
        return redirect()->to('/teams');
    }
}