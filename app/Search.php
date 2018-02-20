<?php


class Search extends appBase
{
    public function routing()
    {
        if ($this->userLogged == false)
        {
            header('location: /space2/login');die;
        }

        if (isset($this->func) && $this->func != '')
        {
            $strFunc = "func" . ucfirst($this->func);
            if (method_exists($this, $strFunc))
            {
                $this->$strFunc();
            }
            else
            {
                header('location: /space2/');
            }
        }
        else
        {
            header('location: /space2/');
        }
    }
}