<?php

abstract class appBase
{
    public $mysqli;
    public $app;
    public $func;
    public $userLogged;

    public function __construct()
    {
        $this->mysqli = $this->dbInitialization();
        $this->sessionInitialisation();
        $this->setRoutVar();
        $this->routing();
    }

    abstract function routing();

    private function dbInitialization()
    {
        $serverName = "localhost";
        $username = "root";
        $password = "4max3min";
        $dataBaseName = "testno2";

        $mysqli = new mysqli($serverName, $username, $password, $dataBaseName);

        return $mysqli;
    }

    private function setRoutVar()
    {
        if (isset($_GET['__func']) && $_GET['__func'] != "" )
        {
            $this->func =  $_GET['__func'];
        }
        else
        {
            $this->func = false;
        }

        if (isset($_GET['__app']) && $_GET['__app'] != "" )
        {
            $this->app =  $_GET['__app'];
        }
        else
        {
            $this->app = false;
        }
    }

    protected function getRequest()
    {
        $requestData = array();

        unset($_GET['__app']);
        unset($_GET['__func']);

        if (is_array($_POST) && count($_POST) > 0)
        {
            $requestData += $_POST;
        }

        if (is_array($_GET) && count($_GET) > 0)
        {
            $requestData += $_GET;
        }

        return $requestData;
    }

    private function sessionInitialisation()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            $this->userLogged = true;
        }
        else
        {
            $this->userLogged = false;
        }
    }
}