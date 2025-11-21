<?php

class testes extends CI_Controller
{
    public function index() {
        
        echo password_hash("admin123", PASSWORD_BCRYPT);

    }
}
