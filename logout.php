<?php
  
  if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']);  
    setcookie('PHPSESSID', null, -1, '/'); 
    header('Location: /DA2/index.php');
} else {
    header('Location: /DA2/index.php');
}
?>
