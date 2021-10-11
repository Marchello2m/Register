<?php

namespace App\Repositories;
use PDO;
use PDOException;

class MysqlRegRepository implements RegRepository
{
    public function __construct()
    {

        $dbhost="127.0.0.1";
        $dbuser="";
        $dbpass="";
        $dbname="login_sample_db";

        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
        {
            die("failed to connect!");
        }

    }
    public function singUp()
    {

        if($_SERVER['REQUEST_METHOD'] =="POST")
        {
            $user_name =$_POST['user_name'];
            $password = $_POST['password'];

            if(!empty($user_name)&& !empty($password) && !is_numeric($user_name))
            {
                $user_id = randomNum(20);  // vares random id pielietot
                $query= "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";


                mysqli_query($con,$query);

                header("Location: login.php");
                die;
            }else
            {
                echo "Please enter some valid information!";
            }
        }

    }
    public function logIn()
    {

        if($_SERVER['REQUEST_METHOD'] =="POST")
        {
            $user_name =$_POST['user_name'];
            $password = $_POST['password'];

            if(!empty($user_name)&& !empty($password) && !is_numeric($user_name))
            {

                $query= "select * from users where user_name = '$user_name' limit 1";


                $result = mysqli_query($con,$query);

                if ($result)
                {
                    if($result && mysqli_num_rows($result)>0)
                    {
                        $user_data =mysqli_fetch_assoc($result);
                        if ($user_data['password'] === $password)
                        {
                            $_SESSION['user_id'] =$user_data['user_id'];
                            header("Location: index.php");
                            die;
                        }

                    }
                }
                echo "Wrong username or password!";

            }else
            {
                echo "Please enter some valid information!";
            }
        }
    }
    public function logOut()
    {

        session_start();
        if(isset($_SESSION['user_id']))
        {
            unset($_SESSION['user_id']);
        }
        header("Location: login.php");
        die;
    }


  public  function checkLogin($con)
    {
        if(  isset($_SESSION['user_id']))
        {
            $id= $_SESSION['user_id'];
            $query ="select * from users where user_id ='$id' limit 1";
            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data =mysqli_fetch_assoc($result);
                return $user_data;

            }
        }
        header("location: login.php");
        die;
    }

  public  function randomNum($length)
    {
        $text = "";
        if ($length < 5) {
            $length = 5;
        }
        $len = rand(4, $length);

        for ($i = 0; $i < $len; $i++) {
            $text .= rand(0, 9);
        }
        return $text;

    }
}