<?php
unset($_SESSION['login']);

header('location: ' . BASE_URL . 'login');die;

?>