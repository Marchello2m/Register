<?php
namespace App\Models;




class Reg
{
    private int $id;
    private string $users_id;
    private string $user_name;
    private string $password;

    public function __construct(        int $id,
                                        string $users_id,
                                        string $user_name,
                                        string $password
    )
    {
        $this->id = $id;

        $this->users_id = $users_id;
        $this->user_name = $user_name;
        $this->password = $password;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsersId(): string
    {
        return $this->users_id;
    }
    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}