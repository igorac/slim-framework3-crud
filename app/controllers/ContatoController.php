<?php

namespace App\controllers;

class ContatoController extends Controller
{
    
    public function index()
    {
        $this->view('contato', [
            'title' => 'Contato',
            'nome'  => 'Igor'
        ]);
    }
}