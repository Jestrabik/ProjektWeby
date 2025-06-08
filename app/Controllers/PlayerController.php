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
    }

    // Výpis hráčů (joiny + stránkování)
    public function index()
    {
        $perPage = (new Players())->perPage;

        $players = $this->playerModel
            ->select('r6_player.*, r6_team.team_name')
            ->join('r6_team', 'r6_player.team_id = r6_team.team_id', 'left')
            ->where('r6_player.deleted_at', null)
            ->paginate($perPage);

        $pager = $this->playerModel->pager;

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
        ]);
    }

    // Uloží nového hráče
    public function store()
    {
        $alert = new AlertLibrary();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'player_name' => 'required',
            'nationality' => 'required',
            'team_id' => 'required|is_not_unique[r6_team.team_id]',
            'role' => 'required',
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
        ]);
    }

    // Uloží změny hráče
    public function update($id)
    {
        $playerModel = new \App\Models\PlayerModel();
        $player = $playerModel->find($id);

        $data = $this->request->getPost();

        // Zpracování uploadu obrázku
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/images', $newName);
            $data['image'] = $newName;

            // Smazání starého obrázku (pokud není defaultní)
            if (!empty($player['image']) && $player['image'] !== 'blank-pfp.jpg') {
                @unlink(ROOTPATH . 'public/images/' . $player['image']);
            }
        } else {
            // Pokud nebyl nahrán nový obrázek, ponech původní
            $data['image'] = $player['image'];
        }

        $playerModel->update($id, $data);

        return redirect()->to('players/detail/' . $id)->with('success', 'Hráč byl upraven.');
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

    public function detail($id)
    {
        $player = $this->playerModel
            ->select('r6_player.*, r6_team.team_name, nationalities.nationality')
            ->join('r6_team', 'r6_player.team_id = r6_team.team_id', 'left')
            ->join('nationalities', 'r6_player.nationality = nationalities.nationality', 'left')
            ->where('r6_player.id', $id)
            ->where('r6_player.deleted_at', null)
            ->first();

        if (!$player) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Hráč nenalezen');
        }

        return view('player/detail', [
            'player' => $player,
        ]);
    }
}