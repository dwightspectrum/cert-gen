<?php

namespace App\Controllers;
use \App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();
        $data['sessData'] = $session->get();
       
        return $this->loadView('components/profile', $data);
    
    }
    public function getUserId() {
        $user_id = session('user_id');  
        $user = new UserModel();
        echo json_encode($user->find($user_id));
    }

    public function update() {
        $user_id = session('user_id');
        $user = new UserModel();
        $user->where('user_id', $user_id);
        $data = [
            'username'            => $this->request->getVar('username'),
            'user_firstname'     => $this->request->getVar('user_firstname'),
            'user_lastname'      => $this->request->getVar('user_lastname')
        ];

        $user->update($user_id, $data);

        echo json_encode([
            'success' => true,
            'message' => 'Your account is successfully updated!'
        ]);
    }

    public function change_pass() {
        $user_id = session('user_id');
        $user = new UserModel();

        $currentPass = $this->request->getVar('password');
        $newPass = $this->request->getVar('new_password');
        $confirmPass = $this->request->getVar('confirm_password');

        $data = $user->where('user_id', $user_id)->first();
        
        if (!$data) {
            echo json_encode(array('success' => false, 'message' => 'Your password does not match!'));
            return;
        }
        
        $oldPass = $data['user_password'];
        $verifyPass = password_verify($currentPass, $oldPass);

        if (!$verifyPass) {
            echo json_encode(array('success' => false, 'message' => 'Your password does not match!'));
            return;
        }

        $userPassword = ['user_password' => password_hash($newPass, PASSWORD_DEFAULT)];

        $user->update($data, $userPassword);

        echo json_encode(array('success' => true, 'message' => 'Your password is successfully updated!'));
               
    
    }
}
