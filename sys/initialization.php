<?php

   include ('app/appBase.php');

   if ($_GET['__app'])
   {
       $className = $_GET['__app'];

       include ('app/' . $className . 'Model.php');
       include ('app/'. $className .'.php');
       include ('view/' . $className . '.html');

       new $className();
   }
   else
   {
       include ('view/home.html');
   }