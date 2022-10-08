<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Musician: Solusi latihan bermusik murah dan nyaman'
        ];

        return view('home', $data);
    }
}
