<?php

namespace App\Controllers;

use App\Libraries\AlertLibrary;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ověření admina (ponecháme)
        if ($username === 'admin' && $password === 'admin') {
            session()->set('isLoggedIn', true);
            session()->set('username', 'admin');
            \App\Libraries\AlertLibrary::setAlert('success', 'Přihlášení bylo úspěšné.');
            return redirect()->to('/');
        }

        // Ověření uživatele z DB
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('isLoggedIn', true);
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            \App\Libraries\AlertLibrary::setAlert('success', 'Přihlášení bylo úspěšné.');
            return redirect()->to('/');
        }

        \App\Libraries\AlertLibrary::setAlert('danger', 'Neplatné přihlašovací údaje.');
        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        AlertLibrary::setAlert('success', 'Byl jste úspěšně odhlášen.');
        return redirect()->to('/');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('auth/register', [
                'validation' => $validation
            ]);
        }

        $userModel = new \App\Models\UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('login')->with('success', 'Registrace proběhla úspěšně. Nyní se můžete přihlásit.');
    }
}