<?php

ob_start();
require_once '../../global.php';


if (isset($_POST['username']))
{
    $username = $Functions->FilterText($_POST['username']);

    if (!empty($username))
{
        $username_query = $db->query("SELECT *
                                       FROM users
                                       WHERE mail = '$username'");
         $count = $username_query->num_rows;
         if($count==0)
         {
           echo 1; //Disponible
           exit;
         }
        else
        {
          echo 0; //en uso
          exit;
        }
}
}




?>
