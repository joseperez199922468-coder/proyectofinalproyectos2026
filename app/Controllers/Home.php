<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function login(): \CodeIgniter\HTTP\RedirectResponse
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (
            ! is_string($username)
            || ! is_string($password)
            || ! hash_equals('admin', $username)
            || ! hash_equals('123', $password)
        ) {
            return redirect()->to('/')->with('login_error', 'Usuario o contraseña incorrectos.');
        }

        $session = session();
        $session->regenerate(true);
        $session->set([
            'logged_in' => true,
            'username' => $username,
        ]);

        return redirect()->to(rtrim(config('App')->baseURL, '/') . '/indice.php');
    }
}
