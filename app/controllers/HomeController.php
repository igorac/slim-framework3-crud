<?php

namespace App\controllers;

use App\models\Model;
use App\models\User;

class HomeController extends Controller
{

    public function index()
    {
        $users = new User;
        $users = $users->select()->get();

        $this->view('home', [
            'users' => $users,
            'title' => 'Home'
        ]);
    }

}