<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }
    
    public function doLogin()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->login($username, $password);
        
        if ($user) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Invalid username or password!');
            return redirect()->back();
        }
    }
    
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register');
    }
    
    public function doRegister()
    {
        $model = new UserModel();
        
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'full_name' => 'required|min_length[3]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'full_name' => $this->request->getPost('full_name'),
            'role' => 'user'
        ];
        
        $model->save($data);
        
        session()->setFlashdata('success', 'Registration successful! Please login.');
        return redirect()->to('/login');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}