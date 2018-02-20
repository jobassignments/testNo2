<?php


class Login extends LoginModal
{
    public function routing()
    {
        if (isset($this->func) && $this->func != '')
        {
            $strFunc = "func" . ucfirst($this->func);
            if (method_exists($this, $strFunc))
            {
                $this->$strFunc();
            }
            else
            {
                header('location:/space2/');die();
            }
        }
        else
        {
            header('location:/space2/');die();
        }
    }

    protected function funcLogin()
    {
        $arrRequestData = $this->getRequest();
        if (isset($arrRequestData['email']) && isset($arrRequestData['password']))
        {
            $strEmail = $arrRequestData['email'];
            $strPassword = $arrRequestData['password'];

            if (is_array($arrReturn = $this->checkLoginData($strEmail, $strPassword)))
            {
                session_start();
                $_SESSION['loggedin'] = true;
                session_write_close();
                header('location:/space2/Search/');
                die();
            }
        }

        header('location:/space2/login');
        die();
    }

    protected function funcLogOut()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header('location:/space2/login');
        die();
    }
}