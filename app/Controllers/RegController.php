<?php

namespace App\controllers;

use App\Models\Reg;
use App\Repositories\MysqlRegRepository;
use App\Repositories\RegRepository;


class RegController
{private RegRepository $regRepository;
    public function __construct()
    {
      $this->regRepository=  new MysqlRegRepository();
    }
    public function singUp()
    {

        require_once 'app/Views/forms/singup.template.php';
    }
    public function logIn()
    {
        require_once 'app/Views/forms/login.template.php';
    }




}