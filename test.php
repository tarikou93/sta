<?php
if (!isset($_SESSION))
  {
    session_start();
  }
  
echo 'hello';

echo $_SESSION['user'];

echo $_SESSION['notif'];

 ?>
