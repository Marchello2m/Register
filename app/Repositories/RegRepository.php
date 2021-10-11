<?php
namespace App\Repositories;

interface RegRepository
{
    public function singUp();
    public function logIn();
    function checkLogin($con);
}