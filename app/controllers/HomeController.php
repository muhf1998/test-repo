<?php

class HomeController extends Controller
{
    public function index()
    {
        $data['page'] = 'home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
