<?php

class Register extends RegisterModel
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
                header('location: /space2/');
            }
        }
        else
        {
            header('location: /space2/');
        }
    }

    private function funcInsertUser()
    {
        $requestData = $this->getRequest();
        $this->insertUser();

        header('location: /space2/Search');
    }
}