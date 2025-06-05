<?php

namespace App\Controllers;

use App\Models\PlayerModel;
use App\Models\NationalityModel;
use App\Models\TeamModel;
use App\Models\PlayerRoleModel;
use App\Libraries\AlertLibrary;
use App\Libraries\ImageLibrary;
use Config\Players;

class PlayerController extends BaseController
{
    protected $playerModel;
    protected $nationalityModel;
    protected $teamModel;
    protected $roleModel;

    public function __construct()
    {
        $this->playerModel = new PlayerModel();
        $this->nationalityModel = new NationalityModel();
        $this->teamModel = new TeamModel();
        $this->roleModel = new PlayerRoleModel();
    }

    // Výpis hráčů (joiny + stránkování)
    public function index()
    {
        $playerModel = new \App\Models\PlayerModel();
        $perPage = (new Players())->perPage;

        $players = $playerModel
            ->where('deleted_at', null)
            ->paginate($perPage);

        $pager = $playerModel->pager;

        return view('player/list', [
            'players' => $players,
            'pager' => $pager,
            'alert' => session()->getFlashdata('alert'),
        ]);
    }

    // Formulář pro přidání hráče
    public function create()
    {
        return view('player/create', [
            'nationalities' => $this->nationalityModel->findAll(),
            'teams' => $this->teamModel->findAll(),
            'roles' => $this->roleModel->findAll(),
        ]);
    }

    // Uloží nového hráče
    public function store()
    {
        $alert = new AlertLibrary();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'player_name' => 'required',
            'nationality_id' => 'required|is_not_unique[nationalities.id]',
            'team_id' => 'required|is_not_unique[r6_team.id]',
            'role_id' => 'required|is_not_unique[r6_role.id]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
        ]);
        if (! $validation->withRequest($this->request)->run()) {
            AlertLibrary::setAlert('danger', 'Chyba validace. Zkontrolujte formulář.');
            return redirect()->back()->withInput();
        }

        $imageName = null;
        if ($img = $this->request->getFile('image')) {
            $imageName = ImageLibrary::upload($img, WRITEPATH . 'uploads');
        }

        $this->playerModel->save([
            'player_name' => $this->request->getPost('player_name'),
            'nationality_id' => $this->request->getPost('nationality_id'),
            'team_id' => $this->request->getPost('team_id'),
            'role_id' => $this->request->getPost('role_id'),
            'age' => $this->request->getPost('age'),
            'headshot_percentage' => $this->request->getPost('headshot_percentage'),
            'total_games' => $this->request->getPost('total_games'),
            'total_deaths' => $this->request->getPost('total_deaths'),
            'kd_ratio' => $this->request->getPost('kd_ratio'),
            'image' => $imageName,
            'description' => $this->request->getPost('description'),
        ]);

        AlertLibrary::setAlert('success', 'Hráč byl úspěšně přidán.');
        return redirect()->to('/players');
    }

    // Formulář pro editaci hráče
    public function edit($id)
    {
        $player = $this->playerModel->find($id);
        if (!$player) {
            AlertLibrary::setAlert('danger', 'Hráč nebyl nalezen.');
            return redirect()->to('/players');
        }
        return view('player/edit', [
            'player' => $player,
            'nationalities' => $this->nationalityModel->findAll(),
            'teams' => $this->teamModel->findAll(),
            'roles' => $this->roleModel->findAll(),
        ]);
    }

    // Uloží změny hráče
    public function update($id)
    {
        $player = $this->playerModel->find($id);
        if (!$player) {
            AlertLibrary::setAlert('danger', 'Hráč nebyl nalezen.');
            return redirect()->to('/players');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'player_name' => 'required',
            'nationality_id' => 'required|is_not_unique[r6_nationality.id]',
            'team_id' => 'required|is_not_unique[r6_team.id]',
            'role_id' => 'required|is_not_unique[r6_role.id]',
        ]);
        if (! $validation->withRequest($this->request)->run()) {
            AlertLibrary::setAlert('danger', 'Chyba validace. Zkontrolujte formulář.');
            return redirect()->back()->withInput();
        }

        $data = [
            'player_name' => $this->request->getPost('player_name'),
            'nationality_id' => $this->request->getPost('nationality_id'),
            'team_id' => $this->request->getPost('team_id'),
            'role_id' => $this->request->getPost('role_id'),
            'age' => $this->request->getPost('age'),
            'headshot_percentage' => $this->request->getPost('headshot_percentage'),
            'total_games' => $this->request->getPost('total_games'),
            'total_deaths' => $this->request->getPost('total_deaths'),
            'kd_ratio' => $this->request->getPost('kd_ratio'),
            'description' => $this->request->getPost('description'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads', $imageName);
            $data['image'] = $imageName;
        }

        $this->playerModel->update($id, $data);

        AlertLibrary::setAlert('success', 'Hráč byl úspěšně upraven.');
        return redirect()->to('/players');
    }

    // Soft delete hráče
    public function delete($id)
    {
        if ($this->playerModel->delete($id)) {
            AlertLibrary::setAlert('success', 'Hráč byl úspěšně smazán.');
        } else {
            AlertLibrary::setAlert('danger', 'Smazání hráče se nezdařilo.');
        }
        return redirect()->to('/players');
    }
}