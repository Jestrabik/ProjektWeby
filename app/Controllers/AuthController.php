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

        // Zde nahraď vlastním ověřením uživatele z DB
        if ($username === 'admin' && $password === 'admin') {
            session()->set('isLoggedIn', true);
            AlertLibrary::setAlert('success', 'Přihlášení bylo úspěšné.');
            return redirect()->to('/players');
        }

        AlertLibrary::setAlert('danger', 'Neplatné přihlašovací údaje.');
        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        AlertLibrary::setAlert('success', 'Byl jste úspěšně odhlášen.');
        return redirect()->to('/');
    }
}